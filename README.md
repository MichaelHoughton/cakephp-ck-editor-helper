# cakephp-ck-editor-helper
A Form helper for CK Editor

Make your form inputs use CK Editor!

## How to Install

1) Install the plugin to app/Plugin/CkEditor

2) In your app/Config/bootstrap.php load the plugin:

```
CakePlugin::load('CkEditor');
```

Or:

```
CakePlugin::loadAll();
```

3) Load the helper in your controller:

```
public $helpers = array('CkEditor.Ck');
```

If you are using the helper site wide, load it in your app/Controller/AppController.php

4) To use the helper in your view, just use:
```
echo $this->Ck->input('description');
```