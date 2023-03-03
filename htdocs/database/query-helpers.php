<?php


function image_grabber($db_helper, $orderby, $orderASCDESC, $andWHERE, $andCondition)
{


    if ($andWHERE == "default") {

        $orderwhereClause = "";
    } else if ($andWHERE = "City") {

        $orderwhereClause = "AND cities.Asciiname = '$andCondition'";
    } else if ($andWHERE = "Country") {

        $orderwhereClause = "AND countries.CountryName = '$andCondition'";
    } else if ($andWHERE = "Rating") {

        $orderwhereClause = "AND imagerating.Rating = $andCondition}";
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


function image_helper($imagepath)
{

    return "https://res.cloudinary.com/dlf6zmtga/image/upload/v1673638741/$imagepath";
}
