<?php


function user_authentication($db_helper)
{

    $userquery = <<<QUERY

    SELECT imagedetails.ImageID, imagedetails.Path, cities.AsciiName, countries.CountryName, imagedetails.Latitude, 
    imagedetails.Longitude, imagerating.rating FROM imagedetails 
    INNER JOIN imagerating ON imagedetails.ImageID  = imagerating.ImageID  
    INNER JOIN cities ON imagedetails.CityCode = cities.CityCode 
    INNER JOIN countries ON cities.CountryCodeISO = countries.ISO 
    WHERE imagerating.UserID = 23 AND imagerating.rating = 3

    QUERY;

    return $db_helper->run($userquery)->fetch_all();

}


function ddropfinder($db_helper, $city_code)
{

    $apiquery = <<<QUERY

    
    QUERY;
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

function image_helper($imagepath)
{

    return "https://res.cloudinary.com/dlf6zmtga/image/upload/v1673638741/$imagepath";
}
