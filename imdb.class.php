<?php

class IMDB
{

    const IMDB_DEBUG = false;
    const IMDB_LANG = 'en-US,en;q=0.9';
    const IMDB_SEARCH_ORIGINAL = true;
    const IMDB_SENSITIVITY = 85;
    const IMDB_TIMEOUT = 15;
    const IMDB_AKA           = '~<td[^>]*>\s*Also\s*Known\s*As\s*</td>\s*<td>(.+)</td>~Uis';
    const IMDB_ASPECT_RATIO  = '~<td[^>]*>Aspect\s*Ratio</td>\s*<td>(.+)</td>~Uis';
    const IMDB_AWARDS        = '~<div\s*class="titlereference-overview-section">\s*Awards:(.+)</div>~Uis';
    const IMDB_BUDGET        = '~<td[^>]*>Budget<\/td>\s*<td>\s*(.*)(?:\(estimated\))\s*<\/td>~Ui';
    const IMDB_CAST          = '~<td[^>]*itemprop="actor"[^>]*>\s*<a\s*href="/name/([^/]*)/\?[^"]*"[^>]*>\s*<span.+>(.+)</span~Ui';
    const IMDB_CAST_IMAGE    = '~(loadlate="(.*)"[^>]*><\/a>\s+<\/td>\s+)?<td[^>]*itemprop="actor"[^>]*>\s*<a\s*href="\/name\/([^/]*)\/\?[^"]*"[^>]*>\s*<span.+>(.+)<\/span+~Uis';
    const IMDB_CERTIFICATION = '~<td[^>]*>\s*Certification\s*</td>\s*<td>(.+)</td>~Ui';
    const IMDB_CHAR          = '~<td class="character">(?:\s+)<div>(.*)(?:\s+)(?: /| \(.*\)|<\/div>)~Ui';
    const IMDB_COLOR         = '~<a href="\/search\/title\?colors=(?:.*)">(.*)<\/a>~Ui';
    const IMDB_COMPANIES     = '~production_companies&ref_=(?:.*)">Edit</a>\s+</header>\s+<ul class="simpleList">(.*)Distributors</h4>~Uis';
    const IMDB_COMPANY       = '~<li>\s+<a href="\/company\/(co[0-9]+)\/">(.*?)</a>~';
    const IMDB_COUNTRY       = '~<a href="/country/(\w+)">(.*)</a>~Ui';
    const IMDB_CREATOR       = '~<div[^>]*>\s*(?:Creator|Creators)\s*:\s*<ul[^>]*>(.+)</ul>~Uxsi';
    const IMDB_DISTRIBUTOR   = '@href="[^"]*update=[t0-9]+:distributors[^"]*">Edit</a>\s*</header>\s*<ul\s*class="simpleList">(.*):special_effects_companies@Uis';
    const IMDB_DISTRIBUTORS  = '@\/company\/(co[0-9]+)\/">(.*?)<\/a>\s+(?:\(([0-9]+)\))?\s+(?:\((.*?)\))?\s+(?:\((.*?)\))?\s+(?:\((?:.*?)\))?\s+</li>@';
    const IMDB_DIRECTOR      = '~<div[^>]*>\s*(?:Director|Directors)\s*:\s*<ul[^>]*>(.+)</ul>~Uxsi';
    const IMDB_GENRE         = '~href="/genre/([a-zA-Z_-]*)/?">([a-zA-Z_ -]*)</a>~Ui';
    const IMDB_GROSS         = '~pl-zebra-list__label">Cumulative Worldwide Gross<\/td>\s+<td>\s+(.*)\s+<~Uxsi';
    const IMDB_ID            = '~((?:tt\d{6,})|(?:itle\?\d{6,}))~';
    const IMDB_LANGUAGE      = '~<a href="\/language\/(\w+)">(.*)<\/a>~Ui';
    const IMDB_LOCATION      = '~href="\/search\/title\?locations=(.*)">(.*)<\/a>~Ui';
    const IMDB_LOCATIONS     = '~href="\/search\/title\?locations=[^>]*>\s?(.*)\s?<\/a>[^"]*<dd>\s?(.*)\s<\/dd>~Ui';
    const IMDB_MPAA          = '~<li class="ipl-inline-list__item">(?:\s+)(TV-Y|TV-Y7|TV-G|TV-PG|TV-14|TV-MA|G|PG|PG-13|R|NC-17|NR|UR)(?:\s+)<\/li>~Ui';
    const IMDB_MUSIC         = '~Music by\s*<\/h4>.*<table class=.*>(.*)</table>~Us';
    const IMDB_NAME          = '~href="/name/(.+)/?(?:\?[^"]*)?"[^>]*>(.+)</a>~Ui';
    const IMDB_MOVIE_DESC    = '~<section class="titlereference-section-overview">\s+<div>\s+(.*)\s*?</div>\s+<hr>\s+<div class="titlereference-overview-section">~Ui';
    const IMDB_SERIES_DESC   = '~<div>\s+(?:.*?</a>\s+</span>\s+</div>\s+<hr>\s+<div>\s+)(.*)\s+</div>\s+<hr>\s+<div class="titlereference-overview-section">~Ui';
    const IMDB_SERIESEP_DESC = '~All Episodes(?:.*?)</li>\s+(?:.*?)?</ul>\s+</span>\s+<hr>\s+</div>\s+<div>\s+(.*?)\s+</div>\s+<hr>~';
    const IMDB_NOT_FOUND_ADV = '~<span>No results.</span>~Ui';
    const IMDB_NOT_FOUND_DES = 'Know what this is about';
    const IMDB_NOT_FOUND_ORG = '~<h1 class="findHeader">No results found for ~Ui';
    const IMDB_PLOT          = '~<td[^>]*>\s*Plot\s*Summary\s*</td>\s*<td>\s*<p>\s*(.*)\s*<em~Ui';
    const IMDB_PLOT_KEYWORDS = '~<td[^>]*>Plot\s*Keywords</td>\s*<td>(.+)(?:<a\s*href="/title/[^>]*>[^<]*</a>\s*</li>\s*</ul>\s*)?</td>~Ui';
    const IMDB_POSTER        = '~<link\s*rel=\'image_src\'\s*href="(.*)">~Ui';
    const IMDB_RATING        = '~class="ipl-rating-star__rating">(.*)<~Ui';
    const IMDB_RATING_COUNT  = '~class="ipl-rating-star__total-votes">\((.*)\)<~Ui';
    const IMDB_RELEASE_DATE  = '~href="/title/[t0-9]*/releaseinfo">(.*)<~Ui';
    const IMDB_RUNTIME       = '~<td[^>]*>\s*Runtime\s*</td>\s*<td>(.+)</td>~Ui';
    const IMDB_SEARCH_ADV    = '~text-primary">1[.]</span>\s*<a.href="\/title\/(tt\d{6,})\/(?:.*?)"(?:\s*)>(?:.*?)<\/a>~Ui';
    const IMDB_SEARCH_ORG    = '~href="\/title\/(tt\d{6,})\/(?:.*?)"\s>(?!<img)(.*?)<\/a>\s(\(([0-9]{4})\))?\s(?:<br/>aka\s<i>"(.*?)"</i>)?~';
    const IMDB_SEASONS       = '~episodes\?season=(?:\d+)">(\d+)<~Ui';
    const IMDB_SOUND_MIX     = '~<td[^>]*>\s*Sound\s*Mix\s*</td>\s*<td>(.+)</td>~Ui';
    const IMDB_TAGLINE       = '~<td[^>]*>\s*Taglines\s*</td>\s*<td>(.+)</td>~Ui';
    const IMDB_TITLE         = '~itemprop="name">(.*)(<\/h3>|<span)~Ui';
    const IMDB_TITLE_EP      = '~titlereference-watch-ribbon"(?:.*)itemprop="name">(.*?)\s+<span\sclass="titlereference-title-year">~Ui';
    const IMDB_TITLE_ORIG    = '~</h3>(?:\s+)(.*)(?:\s+)<span class=\"titlereference-original-title-label~Ui';
    const IMDB_TRAILER       = '~href="videoplayer/(vi[0-9]*)"~Ui';
    const IMDB_TYPE          = '~href="/genre/(?:[a-zA-Z_-]*)/?">(?:[a-zA-Z_ -]*)</a>\s+</li>\s+(?:.*item">)\s+(?:<a href="(?:.*)</a>\s+</li>\s+(?:.*item">)\s+)?([a-zA-Z_ -]*)\s+</li>~Ui';
    const IMDB_URL           = '~https?://(?:.*\.|.*)imdb.com/(?:t|T)itle(?:\?|/)(..\d+)~i';
    const IMDB_USER_REVIEW   = '~href="/title/[t0-9]*/reviews"[^>]*>([^<]*)\s*User~Ui';
    const IMDB_VOTES         = '~"ipl-rating-star__total-votes">\s*\((.*)\)\s*<~Ui';
    const IMDB_WRITER        = '~<div[^>]*>\s*(?:Writer|Writers)\s*:\s*<ul[^>]*>(.+)</ul>~Ui';
    const IMDB_YEAR          = '~og:title\' content="(?:.*)\((?:.*)(\d{4})(?:.*)\)~Ui';

    public static $sNotFound = 'n/A';
    public $iId = null;
    public $isReady = false;
    public $sSeparator = ' / ';
    public $sUrl = null;
    public $bArrayOutput = false;
    private $iCache = 1440;
    private $sRoot = null;
    private $sSource = null;
    private $sSearchFor = 'all';

    public function __construct($sSearch, $iCache = null, $sSearchFor = 'all')
    {
        $this->sRoot = dirname(__FILE__);
        if ( ! is_writable($this->sRoot . '/posters') && ! mkdir($this->sRoot . '/posters')) {
            throw new Exception('The directory “' . $this->sRoot . '/posters” isn’t writable.');
        }
        if ( ! is_writable($this->sRoot . '/cache') && ! mkdir($this->sRoot . '/cache')) {
            throw new Exception('The directory “' . $this->sRoot . '/cache” isn’t writable.');
        }
        if ( ! is_writable($this->sRoot . '/cast') && ! mkdir($this->sRoot . '/cast')) {
            throw new Exception('The directory “' . $this->sRoot . '/cast” isn’t writable.');
        }
        if ( ! function_exists('curl_init')) {
            throw new Exception('You need to enable the PHP cURL extension.');
        }
        if (in_array(
            $sSearchFor,
            [
                'movie',
                'tv',
                'episode',
                'game',
                'documentary',
                'all',
            ]
        )) {
            $this->sSearchFor = $sSearchFor;
        }
        if (true === self::IMDB_DEBUG) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(-1);
            echo '<pre><b>Running:</b> fetchUrl("' . $sSearch . '")</pre>';
        }
        if (null !== $iCache && (int) $iCache > 0) {
            $this->iCache = (int) $iCache;
        }
        
        if ($this->fetchUrl($sSearch, self::IMDB_SEARCH_ORIGINAL)) {
            return true;
        }

        if ($this->fetchUrl($sSearch, !self::IMDB_SEARCH_ORIGINAL)) {
            return true;
        }


    }

    private function fetchUrl($sSearch, $orgSearch = false)
    {
        $sSearch = trim($sSearch);

        // Try to find a valid URL.
        $sId = IMDBHelper::matchRegex($sSearch, self::IMDB_ID, 1);
        if (false !== $sId) {
            $this->iId  = preg_replace('~[\D]~', '', $sId);
            $this->sUrl = 'https://www.imdb.com/title/tt' . $this->iId . '/reference';
            $bSearch    = false;
        } else {
            if (!$orgSearch) {
                switch (strtolower($this->sSearchFor)) {
                    case 'movie':
                        $sParameters = '&title_type=feature';
                        break;
                    case 'tv':
                        $sParameters = '&title_type=tv_movie,tv_series,tv_special,tv_miniseries';
                        break;
                    case 'episode':
                        $sParameters = '&title_type=tv_episode';
                        break;
                    case 'game':
                        $sParameters = '&title_type=video_game';
                        break;
                    case 'documentary':
                        $sParameters = '&title_type=documentary';
                        break;
                    case 'video':
                        $sParameters = '&title_type=video';
                        break;
                    default:
                        $sParameters = '';
                }

                if (preg_match('~([^0-9+])\(?([0-9]{4})\)?~', $sSearch, $fMatch)) {
                    $sParameters .= '&release_date=' . $fMatch[2] . '-01-01,' . $fMatch[2] . '-12-31';
                    $sSearch = preg_replace('~([^0-9+])\(?([0-9]{4})\)?~','', $sSearch);
                }
                
                $this->sUrl = 'https://www.imdb.com/search/title/?title=' . rawurlencode(str_replace(' ', '+', $sSearch)) . $sParameters;               
            } else {
                switch (strtolower($this->sSearchFor)) {
                    case 'movie':
                        $sParameters = '&s=tt&ttype=ft';
                        break;
                    case 'tv':
                        $sParameters = '&s=tt&ttype=tv';
                        break;
                    case 'episode':
                        $sParameters = '&s=tt&ttype=ep';
                        break;
                    case 'game':
                        $sParameters = '&s=tt&ttype=vg';
                        break;
                    default:
                        $sParameters = '&s=tt';
                }
                
                if (preg_match('~([^0-9+])\(?([0-9]{4})\)?~', $sSearch, $fMatch)) {
                    $sYear = $fMatch[2];
                    $sTempSearch = preg_replace('~([^0-9+])\(?([0-9]{4})\)?~','', $sSearch);
                    $sSearch = $sTempSearch . ' (' . $sYear . ')';
                }
                
                $this->sUrl = 'https://www.imdb.com/find?q=' . rawurlencode(str_replace(' ', '+', $sSearch)) . $sParameters;                
            }
            
            $bSearch    = true;

            // Was this search already performed and cached?
            $sRedirectFile = $this->sRoot . '/cache/' . sha1($this->sUrl) . '.redir';
            if (is_readable($sRedirectFile)) {
                if (self::IMDB_DEBUG) {
                    echo '<pre><b>Using redirect:</b> ' . basename($sRedirectFile) . '</pre>';
                }
                $sRedirect  = file_get_contents($sRedirectFile);
                $this->sUrl = trim($sRedirect);
                $this->iId  = preg_replace('~[\D]~', '', IMDBHelper::matchRegex($sRedirect, self::IMDB_ID, 1));
                $bSearch    = false;
            }
        }

        // Does a cache of this movie exist?
        $sCacheFile = $this->sRoot . '/cache/' . sha1($this->iId) . '.cache';
        if (is_readable($sCacheFile)) {
            $iDiff = round(abs(time() - filemtime($sCacheFile)) / 60);
            if ($iDiff < $this->iCache) {
                if (true === self::IMDB_DEBUG) {
                    echo '<pre><b>Using cache:</b> ' . basename($sCacheFile) . '</pre>';
                }
                $this->sSource = file_get_contents($sCacheFile);
                $this->isReady = true;

                return true;
            }
        }

        // Run cURL on the URL.
        if (true === self::IMDB_DEBUG) {
            echo '<pre><b>Running cURL:</b> ' . $this->sUrl . '</pre>';
        }

        $aCurlInfo = IMDBHelper::runCurl($this->sUrl);
        $sSource   = $aCurlInfo['contents'];

        if (false === $sSource) {
            if (true === self::IMDB_DEBUG) {
                echo '<pre><b>cURL error:</b> ' . var_dump($aCurlInfo) . '</pre>';
            }

            return false;
        }

        if (!$orgSearch) {
            // Was the movie found?
            $sMatch = IMDBHelper::matchRegex($sSource, self::IMDB_SEARCH_ADV, 1);
            if (false !== $sMatch) {
                $sUrl = 'https://www.imdb.com/title/' . $sMatch . '/reference';
                if (true === self::IMDB_DEBUG) {
                    echo '<pre><b>New redirect saved:</b> ' . basename($sRedirectFile) . ' => ' . $sUrl . '</pre>';
                }
                file_put_contents($sRedirectFile, $sUrl);
                $this->sSource = null;
                self::fetchUrl($sUrl);

                return true;
            }
            $sMatch = IMDBHelper::matchRegex($sSource, self::IMDB_NOT_FOUND_ADV, 0);
            if (false !== $sMatch) {
                if (true === self::IMDB_DEBUG) {
                    echo '<pre><b>Movie not found:</b> ' . $sSearch . '</pre>';
                }

                return false;
            }
        } else {
            $aReturned = IMDBHelper::matchRegex($sSource, self::IMDB_SEARCH_ORG);

            if ($aReturned) {
                $fTempPercent = 0.00;
                $iTempId = "";
                $sYear = 0;

                if (preg_match('~([^0-9+])\(?([0-9]{4})\)?~', $sSearch, $fMatch)) {
                    $sYear = $fMatch[2];
                    $sTempSearch = preg_replace('~([^0-9+])\(?([0-9]{4})\)?~','', $sSearch);
                    if (true === self::IMDB_DEBUG) {
                        echo '<pre><b>YEAR:</b> ' . $sTempSearch . ' =>  ' . $sYear . '</pre>';
                    }
                }

                foreach ($aReturned[1] as $i => $value) {
                    $sTitle = $aReturned[2][$i];
                    $perc = 0.00;

                    if ($sYear === 0) {
                        $sim = similar_text($sSearch, $sTitle, $perc);
                    } else {
                        if ($sYear != $aReturned[4][$i]) {
                            continue;
                        }
                        $sim = similar_text($sTempSearch, $sTitle, $perc); 
                    }

                    if (round($perc, 3) > round($fTempPercent, 3)) {
                        $iTempId = $value;
                        $fTempPercent = $perc;
                        if (true === self::IMDB_DEBUG) {
                            echo '<pre><b>Set Result:</b> ' . $sSearch . ' =>  ' . $sTitle . ' (' . $perc . '%) </pre>';
                        }
                    }

                }

                if ((round($fTempPercent, 0) > self::IMDB_SENSITIVITY)) {
                    $sUrl = 'https://www.imdb.com/title/' . $iTempId . '/reference';
                    if (true === self::IMDB_DEBUG) {
                        echo '<pre><b>Percentage:</b> ' . $iTempId . ' =>  ' . $fTempPercent . '% </pre>';
                        echo '<pre><b>New redirect saved:</b> ' . basename($sRedirectFile) . ' => ' . $sUrl . '</pre>';
                    }
                    file_put_contents($sRedirectFile, $sUrl);
                    $this->sSource = null;
                    self::fetchUrl($sUrl);

                    return true;                   
                }
            }

            $sMatch = IMDBHelper::matchRegex($sSource, self::IMDB_NOT_FOUND_ORG, 0);
            if (false !== $sMatch) {
                if (true === self::IMDB_DEBUG) {
                    echo '<pre><b>Movie not found:</b> ' . $sSearch . '</pre>';
                }

                return false;
            }

            return false;
        }

        $this->sSource = str_replace(
            [
                "\n",
                "\r\n",
                "\r",
            ],
            '',
            $sSource
        );
        $this->isReady = true;

        // Save cache.
        if (false === $bSearch) {
            if (true === self::IMDB_DEBUG) {
                echo '<pre><b>Cache created:</b> ' . basename($sCacheFile) . '</pre>';
            }
            file_put_contents($sCacheFile, $this->sSource);
        }

        return true;
    }
    public function getPoster($sSize = 'small', $bDownload = false)
    {
        if (true === $this->isReady) {
            $sMatch = IMDBHelper::matchRegex($this->sSource, self::IMDB_POSTER, 1);
            if (false !== $sMatch) {
                if ('big' === strtolower($sSize) && false !== strstr($sMatch, '@._')) {
                    $sMatch = substr($sMatch, 0, strpos($sMatch, '@._')) . '@.jpg';
                }
                if ('xxs' === strtolower($sSize) && false !== strstr($sMatch, '@._')) {
                    $sMatch = substr($sMatch, 0, strpos($sMatch, '@._')) . '@._V1_UY67_CR0,0,45,67_AL_.jpg';
                }
                if ('xs' === strtolower($sSize) && false !== strstr($sMatch, '@._')) {
                    $sMatch = substr($sMatch, 0, strpos($sMatch, '@._')) . '@._V1_UY113_CR0,0,76,113_AL_.jpg';
                }
                if ('s' === strtolower($sSize) && false !== strstr($sMatch, '@._')) {
                    $sMatch = substr($sMatch, 0, strpos($sMatch, '@._')) . '@._V1_UX182_CR0,0,182,268_AL_.jpg';
                }
                if (false === $bDownload) {
                    return IMDBHelper::cleanString($sMatch);
                } else {
                    $sLocal = IMDBHelper::saveImage($sMatch, $this->iId);
                    if (file_exists(dirname(__FILE__) . '/' . $sLocal)) {
                        return $sLocal;
                    } else {
                        return $sMatch;
                    }
                }
            }
        }

        return self::$sNotFound;
    }

}

class IMDBHelper extends IMDB
{
    public static function matchRegex($sContent, $sPattern, $iIndex = null)
    {
        preg_match_all($sPattern, $sContent, $aMatches);
        if ($aMatches === false) {
            return false;
        }
        if ($iIndex !== null && is_int($iIndex)) {
            if (isset($aMatches[$iIndex][0])) {
                return $aMatches[$iIndex][0];
            }

            return false;
        }

        return $aMatches;
    }

    public static function arrayOutput($bArrayOutput, $sSeparator, $sNotFound, $aReturn = null, $bHaveMore = false)
    {
        if ($bArrayOutput) {
            if ($aReturn == null || ! is_array($aReturn)) {
                return [];
            }

            if ($bHaveMore) {
                $aReturn[] = '…';
            }

            return $aReturn;
        } else {
            if ($aReturn == null || ! is_array($aReturn)) {
                return $sNotFound;
            }

            foreach ($aReturn as $i => $value) {
                if (is_array($value)) {
                    $aReturn[$i] = implode($sSeparator, $value);
                }
            }

            return implode($sSeparator, $aReturn) . (($bHaveMore) ? '…' : '');
        }
    }

    public static function cleanString($sInput)
    {
        $aSearch  = [
            'Full summary &raquo;',
            'Full synopsis &raquo;',
            'Add summary &raquo;',
            'Add synopsis &raquo;',
            'See more &raquo;',
            'See why on IMDbPro.',
            "\n",
            "\r",
        ];
        $aReplace = [
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        ];
        $sInput   = str_replace('</li>', ' | ', $sInput);
        $sInput   = strip_tags($sInput);
        $sInput   = str_replace('&nbsp;', ' ', $sInput);
        $sInput   = str_replace($aSearch, $aReplace, $sInput);
        $sInput   = html_entity_decode($sInput, ENT_QUOTES | ENT_HTML5);
        $sInput   = preg_replace('/\s+/', ' ', $sInput);
        $sInput   = trim($sInput);
        $sInput   = rtrim($sInput, ' |');

        return ($sInput ? trim($sInput) : self::$sNotFound);
    }

    public static function getShortText($sText, $iLength = 100)
    {
        if (mb_strlen($sText) <= $iLength) {
            return $sText;
        }

        list($sShort) = explode("\n", wordwrap($sText, $iLength - 1));

        if (substr($sShort, -1) !== '.') {
            return $sShort . '…';
        }

        return $sShort;
    }

    public static function saveImage($sUrl, $iId)
    {
        if (preg_match('~title_addposter.jpg|imdb-share-logo.png~', $sUrl)) {
            return 'posters/not-found.jpg';
        }

        $sFilename = dirname(__FILE__) . '/posters/' . $iId . '.jpg';
        if (file_exists($sFilename)) {
            return 'posters/' . $iId . '.jpg';
        }

        $aCurlInfo = self::runCurl($sUrl, true);
        $sData     = $aCurlInfo['contents'];
        if (false === $sData) {
            return 'posters/not-found.jpg';
        }

        $oFile = fopen($sFilename, 'x');
        fwrite($oFile, $sData);
        fclose($oFile);

        return 'posters/' . $iId . '.jpg';
    }

    /**
     * @param string $sUrl      The URL to fetch.
     * @param bool   $bDownload Download?
     *
     * @return bool|mixed Array on success, false on failure.
     */
    public static function runCurl($sUrl, $bDownload = false)
    {
        $oCurl = curl_init($sUrl);
        curl_setopt_array(
            $oCurl,
            [
                CURLOPT_BINARYTRANSFER => ($bDownload ? true : false),
                CURLOPT_CONNECTTIMEOUT => self::IMDB_TIMEOUT,
                CURLOPT_ENCODING       => '',
                CURLOPT_FOLLOWLOCATION => 0,
                CURLOPT_FRESH_CONNECT  => 0,
                CURLOPT_HEADER         => ($bDownload ? false : true),
                CURLOPT_HTTPHEADER     => [
                    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Charset: utf-8, iso-8859-1;q=0.5',
                    'Accept-Language: ' . self::IMDB_LANG,
                ],
                CURLOPT_REFERER        => 'https://www.imdb.com',
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_TIMEOUT        => self::IMDB_TIMEOUT,
                CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
                CURLOPT_VERBOSE        => 0,
            ]
        );
        $sOutput   = curl_exec($oCurl);
        $aCurlInfo = curl_getinfo($oCurl);
        curl_close($oCurl);
        $aCurlInfo['contents'] = $sOutput;

        if (200 !== $aCurlInfo['http_code'] && 302 !== $aCurlInfo['http_code']) {
            if (true === self::IMDB_DEBUG) {
                echo '<pre><b>cURL returned wrong HTTP code “' . $aCurlInfo['http_code'] . '”, aborting.</b></pre>';
            }

            return false;
        }

        return $aCurlInfo;
    }
    public static function saveImageCast($sUrl, $cId)
    {
        if ( ! preg_match('~http~', $sUrl)) {
            return 'cast/not-found.jpg';
        }

        $sFilename = dirname(__FILE__) . '/cast/' . $cId . '.jpg';
        if (file_exists($sFilename)) {
            return 'cast/' . $cId . '.jpg';
        }

        $aCurlInfo = self::runCurl($sUrl, true);
        $sData     = $aCurlInfo['contents'];
        if (false === $sData) {
            return 'cast/not-found.jpg';
        }

        $oFile = fopen($sFilename, 'x');
        fwrite($oFile, $sData);
        fclose($oFile);

        return 'cast/' . $cId . '.jpg';
    }
}
