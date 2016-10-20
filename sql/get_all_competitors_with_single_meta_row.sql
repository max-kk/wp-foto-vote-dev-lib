SELECT c.*, m.value FROM `tm_fv_competitors` c
LEFT JOIN `tm_fv_meta` m ON c.id = m.contestant_id AND m.meta_key = 'county'
ORDER BY `m`.`meta_key` ASC

## NOTE - replace "tm_" to your database prefix
## NOTE - replace 'county' to your meta_key - where get it https://yadi.sk/i/tXTfxkt0x2Y3N
