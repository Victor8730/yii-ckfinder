CKFinder widget for Yii Framework
============

Simple Yii CKFinder widget.

Adds the ability to upload files to the CKeditor

Installation
------------

Copy this widget to Extensions folder or run the command in the console
```
git clone https://github.com/Victor8730/yii-ckfinder.git
```

Usage
-----

If not import class, call the widget 

```php
$this->widget('application.extensions.yii-ckfinder.CKFinderWidget', [
    'nameCkeditor'=>'ckeditor-for-body'
]);
```

If import the widget class file, call the widget:

```php
Yii::import('application.extensions.yii-ckfinder.CKFinderWidget');
$this->widget('CKFinderWidget', [
    'nameCkeditor'=>'ckeditor-for-body'
]);


```