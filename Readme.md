# Stepmania File Modeler

## Conveting SM to SSC and back

```
    $sm = new Zanson\SMParser\FileParser\SM();
    $sm->parse(dirname(__DIR__).'/test.sm');
    $convert = new \Zanson\SMParser\Model\Convert();
    $ssc = $convert->SMtoSSC($sm->song);
```

```
    $ssc = new Zanson\SMParser\FileParser\SSC();
    $ssc->parse(dirname(__DIR__).'/test.sm');
    $convert = new \Zanson\SMParser\Model\Convert();
    $sm = $convert->SSCtoSM($ssc->song);
```

