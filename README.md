# ssi
COVID-19 overvågningsdata fra SSI (Statens Serum Institut) fra 06.05.2020 og frem. De oprindelige zip-filer er pakket ud i normaliserede, indekserbare kataloger med datoer, således at der kan itereres over data programmatisk og forudsigeligt. Det gør det muligt at scripte sig frem til f.eks kommunedata i JSON-format, som kan benyttes på hjemmesider der understøtter javascript. 

## JSON
Et par JSON-filer er klar til brug. 

`Municipality_cases_time_series.json`
Bekræftede COVID-19-tilfælde kommune / dag

`Municipality_tested_persons_time_series.json`
COVID-19-testede kommune / dag

`Municipality_test_pos.json`
Testede, bekræftede, kumulativ incidens kommune / dak

## Script
`build.php` genererer ovenstående JSON for hele perioden, dvs fra 06.05.2020  frem til seneste kørsel. Det er ussel indianerprogrammering som kun har haft til formål at få hevet data ud i en fart. Hvis man selv vil bruge det, er man nødt til selv manuelt at korrigere slutdatoen. Det eneste intelligente er, at der tages forbehold for noget af det skrammel SSI får med fra eksporten fra deres regneark. 



