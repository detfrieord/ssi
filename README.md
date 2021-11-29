# ssi
COVID-19 overvågningsdata fra SSI (Statens Serum Institut) fra 06.05.2020 og frem. De oprindelige zip-filer er pakket ud i normaliserede, indekserbare kataloger med datoer, således at der kan itereres over data programmatisk og forudsigeligt. Det gør det muligt at scripte sig frem til f.eks kommunedata i JSON-format, som kan benyttes på hjemmesider der understøtter javascript. 

### Hvorfor
Der har gennem hele COVID-19-perioden været skiftende problemer eller mærkværdigheder med SSI's overvågningsdata.

Det er til at leve med at man skifter format, udvider / indskrænker tilgængeligheden af overvågningsdata o.lign. Men i COVID-19 og SSI's tilfælde virker der til at være tale om aktive benspænd. 

Vi taler om inkonsistent navngivning af datasæt. Der skiftes i flæng mellem store og små bogstaver, inkonsistente dato-formater og skift mellem ental / flertal. Til overflod forsynes zip-filer med en slags "hash"-kode i enden. I praksis gør det umuligt at benytte data uden en del "massage". Det er vanskeligt at tro, at det ikke er en helt bevidst taktik fra myndighedernes side. Alternativt er det ikke en opgave der på nogen måde er taget særlig seriøst, og det har sådan set aldrig været meningen at offentligheden skulle kunne bruge deres overvågningsdata til noget som helst. Pick your choice. 


### JSON
Et par JSON-filer er klar til brug. 

`Municipality_cases_time_series.json`

Bekræftede COVID-19-tilfælde kommune / dag.

`Municipality_tested_persons_time_series.json`

COVID-19-testede kommune / dag.

`Municipality_test_pos.json`

Testede, bekræftede, kumulativ incidens kommune / dag.

### Script
`build.php` genererer ovenstående JSON for hele perioden, dvs fra 06.05.2020  frem til seneste kørsel. Det er ussel indianerprogrammering som kun har haft til formål at få hevet data ud i en fart. Hvis man selv vil bruge det, er man nødt til selv manuelt at korrigere slutdatoen. Det eneste intelligente er, at der tages forbehold for noget af det skrammel SSI får med fra eksporten fra deres regneark. 

### Hent alle data
Du kan benytte de scriptede JSON. Hvis du vil lege videre, der er data f.eks omkring f.eks køn og alder som detfrieord ikke har berørt, kan man hente hele pakken ned med 

`$ git clone https://github.com/detfrieord/ssi.git`


