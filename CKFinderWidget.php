<?php
/**
 * Simple Yii CKFinder widget
 * @property string $configJS
 * @property string $assetsPath
 * @property string $assetsUrl
 * @author Victor Galiuzov <victor8730@gmail.com>
 * @version 0.0.1
 */ 
class CKFinderWidget extends CInputWidget {
    /**
     * Assets package ID.
     */
    const PACKAGE_ID = 'ckfinder-widget';

    /**
     * How name CKEDITOR
     * needed for update option ckeditor
     *
     * @var string
     */
    public $nameCkeditor = '';

    /**
     * @var array Default config
     */
    public $config = array(
        // You can set your default config
        //'language' => 'ru',
    );

    public $package = array();

    /**
     * Init widget.
     * Connecting libraries
     * If you need to connect the skin, you can specify css
     */
    public function init()
    {
        parent::init();

        $this->package = [
            'baseUrl' => $this->assetsUrl,
            'js' => [
                'ckfinder.js',
            ],
            'css' => []
        ];

        $this->registerClientScript();
    }

    /**
     * Register CSS and Script.
     */
    protected function registerClientScript()
    {
        Yii::app()->clientScript->addPackage(self::PACKAGE_ID, $this->package)->registerPackage(self::PACKAGE_ID);
    }

    /**
     * Add replace config
     * Not include in registerClientScript because need add script after ckeditor
     */
    public function run()
    {
        echo "<script>
        CKEDITOR.replace('".$this->nameCkeditor."', {
            extraPlugins: 'uploadimage,image2',
            filebrowserBrowseUrl : '".$this->package['baseUrl']."/ckfinder.html',
            filebrowserImageBrowseUrl : '".$this->package['baseUrl']."/ckfinder.html?type=Images',
            filebrowserUploadUrl : '".$this->package['baseUrl']."/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '".$this->package['baseUrl']."/core/connector/php/connector.php?command=QuickUpload&type=Images',
        });
        </script>";
    }

    /**
     * Get the assets path.
     * @return string
     */
    public function getAssetsPath()
    {
        return __DIR__ . '/assets';
    }

    /**
     * Publish assets and return url.
     * @return string
     */
    public function getAssetsUrl()
    {
        return Yii::app()->assetManager->publish($this->assetsPath);
    }

}
