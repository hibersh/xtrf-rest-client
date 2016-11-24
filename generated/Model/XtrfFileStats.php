<?php

namespace drunomics\XtrfClient\Model;

class XtrfFileStats
{
    /**
     * @var int
     */
    protected $charactersWithoutSpaces;
    /**
     * @var int
     */
    protected $charactersWithSpaces;
    /**
     * @var int
     */
    protected $lines;
    /**
     * @var int
     */
    protected $pages;
    /**
     * @var int
     */
    protected $words;
    /**
     * @return int
     */
    public function getCharactersWithoutSpaces()
    {
        return $this->charactersWithoutSpaces;
    }
    /**
     * @param int $charactersWithoutSpaces
     *
     * @return self
     */
    public function setCharactersWithoutSpaces($charactersWithoutSpaces = null)
    {
        $this->charactersWithoutSpaces = $charactersWithoutSpaces;
        return $this;
    }
    /**
     * @return int
     */
    public function getCharactersWithSpaces()
    {
        return $this->charactersWithSpaces;
    }
    /**
     * @param int $charactersWithSpaces
     *
     * @return self
     */
    public function setCharactersWithSpaces($charactersWithSpaces = null)
    {
        $this->charactersWithSpaces = $charactersWithSpaces;
        return $this;
    }
    /**
     * @return int
     */
    public function getLines()
    {
        return $this->lines;
    }
    /**
     * @param int $lines
     *
     * @return self
     */
    public function setLines($lines = null)
    {
        $this->lines = $lines;
        return $this;
    }
    /**
     * @return int
     */
    public function getPages()
    {
        return $this->pages;
    }
    /**
     * @param int $pages
     *
     * @return self
     */
    public function setPages($pages = null)
    {
        $this->pages = $pages;
        return $this;
    }
    /**
     * @return int
     */
    public function getWords()
    {
        return $this->words;
    }
    /**
     * @param int $words
     *
     * @return self
     */
    public function setWords($words = null)
    {
        $this->words = $words;
        return $this;
    }
}