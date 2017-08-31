<?php

class YouTubePage extends PHPUnit_Extensions_Selenium2TestCase
{
    protected $url = 'https://www.youtube.com/';
    public function openPage(){
        $this->url($this->url);
    }

    protected $searchField='#search .gsfi.ytd-searchbox';

    public function inputTextToSearchField($inputText){
        $this->byCssSelector(searchField)->value(inputText);
    }

    public function searchByInputText ($inputText){
        $searchIconLegacy = '#search-icon-legacy';
        $this->inputTextToSearchField(inputText);
        $this->byCssSelector(searchIconLegacy)->click();
    }

    public function isExistingImageOfFirstElementInSearchList(){
        $firstElementFromSearch = '#contents .style-scope.ytd-item-section-renderer > ytd-video-renderer:nth-child(1)';
        $imageLocator = $firstElementFromSearch . "ytd-thumbnail img";
        if ($this->byCssSelector($imageLocator)->attribute("scr") !== "") {
            return true;
        } else false;
    }
}
