<?php

class HelpController
{
    public function index()
    {
        include './views/help/index.php';
    }

    public function faq()
    {
        include './views/help/faq.php';
    }

    public function guides()
    {
        include './views/help/guides.php';
    }

    public function contact()
    {
        include './views/help/contact.php';
    }

    public function search()
    {
        include './views/help/search.php';
    }
}
