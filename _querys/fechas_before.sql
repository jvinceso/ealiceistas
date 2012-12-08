SELECT
`empleo_ofrecido`.`cEOfBases`,
`empleo_ofrecido`.`cEOfDescripcion`,
`empleo_ofrecido`.`cEOfSumilla`,
`empleo_ofrecido`.`cEOfTitulo`,
`empleo_ofrecido`.`dEOfFechaLimite`,
`empleo_ofrecido`.`dEOfFechaRegistro`,
`empleo_ofrecido`.`nEOdEstado`,
`empleo_ofrecido`.`nEOfId`
FROM `bd_aeal`.`empleo_ofrecido`  where dEOfFechaLimite> current_date order by dEOfFechaLimite ASC;

select current_date;