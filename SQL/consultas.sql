--9. SQL para obtener la cantidad de incidencias pendientes por propiedad.
SELECT 
    a.id_apartamento,
    a.direccion,
    COUNT(i.id_incidencia) AS cantidad_incidencias_pendientes
FROM 
    apartamento a
LEFT JOIN 
    reserva r ON r.id_apartamento = a.id_apartamento
LEFT JOIN 
    incidencia i ON i.id_reserva = r.id_reserva AND i.estado = 'ABIERTA'
GROUP BY 
    a.id_apartamento, a.direccion
ORDER BY 
    cantidad_incidencias_pendientes DESC;

-- 10. SQL para obtener la incidencia con más tareas “no solucionadas” por propiedad

WITH IncidenciasContadas AS (
    SELECT
        a.id_apartamento,
        a.direccion,
        i.id_incidencia,
        COUNT(*) AS cantidad_no_solucionadas
    FROM
        incidencia i
    JOIN 
        reserva r ON i.id_reserva = r.id_reserva
    JOIN 
        apartamento a ON r.id_apartamento = a.id_apartamento
    WHERE 
        i.estado != 'SOLUCIONADA'  -- Contar solo las tareas no solucionadas
    GROUP BY
        a.id_apartamento, a.direccion, i.id_incidencia
)

SELECT 
    direccion,
    id_apartamento,
    id_incidencia,
    cantidad_no_solucionadas
FROM (
    SELECT *,
           ROW_NUMBER() OVER(PARTITION BY id_apartamento ORDER BY cantidad_no_solucionadas DESC) AS ranking
    FROM IncidenciasContadas
) AS Subconsulta
WHERE ranking = 1
ORDER BY cantidad_no_solucionadas DESC;

-- 11. SQL para indicar cuál es el valor total que el cliente, propietario, homeselect asume
-- por propiedad. Es decir, tenemos 2 incidencias y en 1 el cliente X asumió 100€, el
-- propietario asumió 50€ , en la segunda incidencia el cliente Y asumió 300€ y
-- homeselect asumió 400€. Entonces deberá salir
-- a. Propiedad X
-- i. Cliente -> 400€
-- ii. Propietario -> 50€
-- iii. HomeSelect -> 400€
 
SELECT a.id_apartamento, a.direccion AS propiedad, SUM(CASE WHEN t.responsable = 'cliente' THEN t.costo ELSE 0 END) AS cliente, SUM(CASE WHEN t.responsable = 'propietario' THEN t.costo ELSE 0 END) AS propietario, SUM(CASE WHEN t.responsable = 'homeselect' THEN t.costo ELSE 0 END) AS homeselect 
FROM apartamento a JOIN reserva r ON a.id_apartamento = r.id_apartamento JOIN incidencia i ON r.id_reserva = i.id_reserva JOIN tarea t ON i.id_incidencia = t.id_incidencia 
GROUP BY a.id_apartamento;

-- 12. SQL para obtener la propiedad que más incidencias se le han reportado entre el
-- 2024-04-01 al 2024-11-01

SELECT a.id_apartamento, a.direccion, COUNT(i.id_incidencia) AS total_incidencias 
FROM apartamento a JOIN reserva r ON a.id_apartamento = r.id_apartamento JOIN incidencia i ON r.id_reserva = i.id_reserva 
WHERE i.reporte BETWEEN '2024-04-01' AND '2024-11-01' 
GROUP BY a.direccion 
ORDER BY total_incidencias DESC LIMIT 1;

-- 13. SQL para obtener el costo asumido más alto por homeselect del total de una
-- incidencia (recuerde que una incidencia puede tener varias tareas que son las que
-- tienen el asumido por)

SELECT i.id_incidencia, MAX(t.costo) AS max_costo_homeselect 
FROM incidencia i JOIN tarea t ON i.id_incidencia = t.id_incidencia 
WHERE t.responsable = 'homeselect' 
GROUP BY i.id_incidencia 
ORDER BY max_costo_homeselect DESC LIMIT 1;

-- 14. SQL para obtener el código de la reserva actual o el código de la próxima reserva de
-- cada apartamento, nos debe entregar nombre del apartamento, fecha de inicio y
-- fecha final de la reserva. Aclaración: si el apartamento el día de hoy está ocupado,
-- debe entregar los datos de esa reserva actual; si el apartamento el día de hoy está
-- vacío, debe entregar los datos de la próxima reserva.

SELECT a.direccion AS nombre_apartamento, r.id_reserva, r.fecha_inicio, r.fecha_fin
FROM apartamento a LEFT JOIN reserva r ON a.id_apartamento = r.id_apartamento 
WHERE (r.fecha_inicio <= CURDATE() AND r.fecha_fin >= CURDATE()) OR r.fecha_inicio > CURDATE() 
ORDER BY a.direccion, CASE WHEN r.fecha_inicio <= CURDATE() AND r.fecha_fin >= CURDATE() THEN 1 ELSE 2 END, r.fecha_inicio LIMIT 1;
