<?php


function image_grabber($db_helper)
{

    $query = <<<QUERY

    SELECT imagedetails.ImageID, imagedetails.Path, cities.AsciiName, countries.CountryName, imagedetails.Latitude, 
    imagedetails.Longitude, imagerating.rating FROM imagedetails 
    INNER JOIN imagerating ON imagedetails.ImageID  = imagerating.ImageID  
    INNER JOIN cities ON imagedetails.CityCode = cities.CityCode 
    INNER JOIN countries ON cities.CountryCodeISO = countries.ISO 
    WHERE imagerating.UserID = 23 
    ORDER BY rating DESC

    QUERY;

    return $db_helper->run($query)->fetchAll();
}


function image_helper($imagepath)
{

    return "https://res.cloudinary.com/dlf6zmtga/image/upload/v1673638741/$imagepath";
}
