<?php


function image_grabber($db_helper, $orderby, $orderASCDESC)
{

    echo $orderby;


    if ($orderby == "default") {

        $orderbyClause = "ImageID ASC";
    } else if ($orderby == "City") {

        if ($orderASCDESC == "ASC") {

            $orderbyClause = "cities.AsciiName ASC";
        } else if ($orderASCDESC == "DESC") {

            $orderbyClause = "cities.AsciiName DESC";
        }
    } else if ($orderby == "Country") {

        if ($orderASCDESC == "ASC") {
            $orderbyClause = "Country ASC";
        } else {
            $orderbyClause = "Country DESC";
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
    WHERE imagerating.UserID = 23 
    ORDER BY $orderbyClause 

    QUERY;

    return $db_helper->run($query)->fetchAll();
}


function image_helper($imagepath)
{

    return "https://res.cloudinary.com/dlf6zmtga/image/upload/v1673638741/$imagepath";
}
