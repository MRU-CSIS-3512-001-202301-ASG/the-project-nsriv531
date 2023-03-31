<?php

function imageratingFinder($db_helper, $id) {
    $rating = <<<QUERY

    SELECT ImageID, rating FROM imagerating 
    WHERE Rating = 3 AND ImageID = :image_id
    
    QUERY;

    return $db_helper->run($rating, [":image_id" => $id])->fetchAll();
}

function get_language($db_helper, $iso) {

    $language = <<<QUERY

    SELECT name FROM languages
    WHERE iso = :language_iso

    QUERY;

    return $db_helper->run($language, [":language_iso" => $iso])->fetchAll();
}

function get_country_names($db_helper, $iso){

    $countryName = <<<QUERY

    SELECT CountryName FROM countries 
    WHERE countries.ISO = :country_iso

    QUERY;

    return $db_helper->run($countryName, [":country_iso" => $iso])->fetchAll();

}

function get_cities($db_helper, $iso)
{

    $cities = <<<QUERY

    SELECT DISTINCT AsciiName FROM cities 
    WHERE CountryCodeISO = :country_iso
    ORDER BY cities.AsciiName 

QUERY;

return $db_helper->run($cities, [":country_iso" => $iso])->fetchAll();

}


function image_from_cities($db_helper, $cityName) {

    $imageFromCity = <<<QUERY

    SELECT imagedetails.Path FROM imagedetails 
    INNER JOIN cities ON imagedetails.CityCode = cities.CityCode
    WHERE cities.AsciiName  = :cityname
    
    QUERY;

    return $db_helper->run($imageFromCity, [":cityname" => $cityName])->fetchAll();

}

function countryInformation($db_helper, $iso)
{

    $countryInfo = <<<QUERY
    SELECT DISTINCT countries.CountryName,  countries.ISO, countries.Area, countries.Population, countries.Capital, countries.CurrencyName, 
    countries.TopLevelDomain, countries.CountryDescription, countries.Languages, countries.Neighbours 
    FROM imagedetails 
    INNER JOIN countries ON imagedetails.CountryCodeISO  = countries.ISO 
    WHERE CountryCodeISO = :country_iso
    QUERY;
    
    return $db_helper->run($countryInfo, [":country_iso" => $iso])->fetchAll();

}

function cityInformation($db_helper, $cityname) {

    $cityInfo = <<<QUERY
    SELECT AsciiName, Population, Elevation, TimeZone 
    FROM cities
    WHERE Asciiname = :city_Name
    QUERY;
    
    return $db_helper->run($cityInfo, [":city_Name" => $cityname])->fetchAll();

}

function image_from_countries($db_helper, $iso)
{

    $imagefromCountry = <<<QUERY

    SELECT imagedetails.ImageID, imagedetails.Path, cities.CountryCodeISO FROM imagedetails 
    INNER JOIN cities ON imagedetails.CityCode = cities.CityCode
    WHERE cities.CountryCodeISO = :ISOCode

    QUERY;

    return $db_helper->run($imagefromCountry, [":ISOCode" => $iso])->fetchAll();
}

function get_countries($db_helper)
{

    $countiresQuery = <<<QUERY

    SELECT CountryName, ISO FROM countries ORDER BY CountryName ASC
    
QUERY;

    return $db_helper->run($countiresQuery)->fetchAll();
}

function user_authentication($db_helper)
{

    $userauthentication = <<<QUERY

    SELECT * FROM administrators

    QUERY;

    return $db_helper->run($userauthentication)->fetch();
}


function ddropfindercity($db_helper, $citycode)
{
    $apicityquery = <<<QUERY

    SELECT cities.CityCode, cities.AsciiName AS city, countries.CountryName AS country, imagedetails.Latitude AS lat, 
    imagedetails.Longitude as 'long' FROM imagedetails 
    INNER JOIN imagerating ON imagedetails.ImageID  = imagerating.ImageID  
    INNER JOIN cities ON imagedetails.CityCode = cities.CityCode 
    INNER JOIN countries ON cities.CountryCodeISO = countries.ISO 
    WHERE imagerating.UserID = 23 AND imagerating.Rating = 3 and cities.CityCode = :citycode

    QUERY;

    return $db_helper->run($apicityquery, [":citycode" => $citycode])->fetchAll();
}

function ddropfinder($db_helper)
{


    $apiquery = <<<QUERY

    SELECT cities.AsciiName AS city, countries.CountryName AS country, imagedetails.Latitude AS lat, 
    imagedetails.Longitude as 'long' FROM imagedetails 
    INNER JOIN imagerating ON imagedetails.ImageID  = imagerating.ImageID  
    INNER JOIN cities ON imagedetails.CityCode = cities.CityCode 
    INNER JOIN countries ON cities.CountryCodeISO = countries.ISO 
    WHERE imagerating.UserID = 23 AND imagerating.Rating = 3 

    QUERY;


    return $db_helper->run($apiquery)->fetchAll();
}

function image_grabber($db_helper, $orderby, $orderASCDESC, $andWHERE, $andClause)
{

    if ($andWHERE == "default") {

        $orderwhereClause = "";

    } else if ($andWHERE == "City") {

        $orderwhereClause = "AND cities.Asciiname = '$andClause'";
    } else if ($andWHERE == "Country") {

        $orderwhereClause = "AND countries.CountryName = '$andClause'";
    } else if ($andWHERE == "Rating") {

        $orderwhereClause = "AND imagerating.Rating = $andClause";
    }

    if ($orderby == "default") {

        $orderbyClause = "ImageID ASC";
    } else if ($orderby == "City") {

        if ($orderASCDESC == "ASC") {
            $orderbyClause = "cities.AsciiName ASC";
        } else if ($orderASCDESC == "DESC") {

            $orderbyClause = "cities.AsciiName DESC";
        }
    } else if ($orderby == "Rating") {

        if ($orderASCDESC == "ASC") {
            $orderbyClause = "Rating ASC";
        } else {
            $orderbyClause = "Rating DESC";
        }
    }

    $query = <<<QUERY

    SELECT imagedetails.ImageID, imagedetails.Path, cities.AsciiName, countries.CountryName, imagedetails.Latitude, 
    imagedetails.Longitude, imagerating.rating FROM imagedetails 
    INNER JOIN imagerating ON imagedetails.ImageID  = imagerating.ImageID  
    INNER JOIN cities ON imagedetails.CityCode = cities.CityCode 
    INNER JOIN countries ON cities.CountryCodeISO = countries.ISO 
    WHERE imagerating.UserID = 23 $orderwhereClause
    ORDER BY $orderbyClause 

    QUERY;

    return $db_helper->run($query)->fetchAll();
}

function rating_Change($db_helper, $changeInRating, $imageID)
{

    $query = <<<QUERY

    UPDATE imagerating
    SET imagerating.rating=$changeInRating
    WHERE imagerating.ImageID = $imageID

    QUERY;

    return $db_helper->run($query);
}


function temp_password_inserter()
{

    $variable = password_hash("password", PASSWORD_BCRYPT);

    $passwordQuery = <<<QUERY

    INSERT INTO administrators (password) VALUES ($variable)
    WHERE username = 'admin'

    QUERY;
}

function image_helper($imagepath)
{

    return "https://res.cloudinary.com/dlf6zmtga/image/upload/v1673638741/$imagepath";
}
