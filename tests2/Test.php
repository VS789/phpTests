<?php
require_once './pages/YouTubePage.php';
class Test extends PHPUnit_Extensions_Selenium2TestCase
{

    protected function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('localhost');
        $this->setBrowser('chrome');
    }

    public function ImageOfFirstElementInSearchListIsExistingAfterSearchingFromGeneralPage()
    {
        $youTubePage = new YouTubePage();
        $youTubePage->openPage();
        $youTubePage->inputTextToSearchField("ураган");
        $youTubePage->isExistingImageOfFirstElementInSearchList();
        $this->assertTrue($youTubePage->isExistingImageOfFirstElementInSearchList(),"Image for first element in search field is not displayed");
    }

    public function tearDown()
    {
        $this->stop();
    }
}
