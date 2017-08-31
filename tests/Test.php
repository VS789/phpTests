<?php

require_once "localhostPage.php";
class Test extends PHPUnit_Extensions_Selenium2TestCase {

    public function data(){
        $stack = array();
        $file = fopen("../data/data.csv", "r");
        for ($i=0; $data=fgetcsv($file,1000,";"); $i++) {
            array_push($stack,$data[$i]);
        }
        fclose($file);
        return $array = array_values($stack);
    }

    protected function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('localhost');
        $this->setBrowser('chrome');
    }

    protected $url = 'https://google.com';

    protected function prepare(){
        $session = $this->prepareSession();
        $session->cookie()->add('test', 'seo')->set();
        $this->url($this->url);
    }

    public function testSEOMetaDataURL()
    {
        $this->prepare();
        $this->assertEquals($this->getBrowserUrl(), $this->data()[0].$this->toString(),"URL is not correct");
    }

    public function testSEOMetaTitle()
    {
        $this->prepare();
        $this->assertEquals($this->byCssSelector(localhostPage::$MetaTitleSelector)->text(), $this->data()[1],"Title is not correct");
    }

    public function testSEOMetaDescription()
    {
        $this->prepare();
        $this->assertEquals($this->byCssSelector(localhostPage::$MetaDescriptionSelectors)->text(),$this->data()[2],"Description is not correct");
    }

    public function tearDown()
    {
        $this->stop();
    }
}
?>
