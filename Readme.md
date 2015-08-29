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

## Exporting
Exports simply take the object in the parser and return a string to be passed
to a file or output of your choosing.

If you are not using the file parser class and just have a model, you must 
instantiate the parser class, and set the song using setsong($object) then 
run export.

```
$ssc = new Zanson\SMParser\FileParser\SSC();
$ssc->parse(file_get_contents(dirname(__DIR__) . '/test.ssc'));
file_put_contents($ssc->getFileName(), $ssc->export());
```

```
$ssc = new Zanson\SMParser\Model\SSC();
$parse = new Zanson\SMParser\FileParser\SSC();
$parse->setSong($ssc);
file_put_contents($parse->getFileName(), $parse->export());
```