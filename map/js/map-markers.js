/* <![CDATA[ */

var map;
var locationsMarkers = [];
var parkingMarkers = [];
var locationsList = [];
var mapURL = window.location.href.split('?')[0];


var locations = [{	"name":			"GEB 110",
    "analytics_name": "geb110",
    "name2": "",
    "link": "",
    "location": [35.139704, -90.032176],
    "display_address": "8 S. Dunlap Street<br />Memphis, TN 38163",
    "address": "8 S. Dunlap Street",
    "address_maps": "8 S. Dunlap Street Memphis, TN 38163 [35.139704, -90.032176]",
    "thumb": "",
    "thumb_using_id": "9800",
    "image": false,
    "description": "STUDENTS ONLY<br />Open Access Lab, Card Swipe 24/7<br />~50 Computers<br />9 Printers<br />2 Scanners<br />1 Fax Machine",
    "type": "labs",
    "id": "9800",
    "tags": ""
},{	"name":			"Pharmacy 201",
    "analytics_name": "pharmacy201",
    "name2": "",
    "link": "",
    "location": [35.139608, -90.031382],
    "display_address": "881 Madison Avenue<br />Memphis, TN 38163",
    "address": "881 Madison Avenue",
    "address_maps": "881 Madison Avenue Memphis, TN 38163 [35.139608, -90.031382]",
    "thumb": "",
    "thumb_using_id": "9801",
    "image": false,
    "description": "Open 8 to 5, if NO TESTING<br />77 computers<br />No printers",
    "type": "labs",
    "id": "9801",
    "tags": ""
},{	"name":			"SAC 314",
    "analytics_name": "sac314",
    "name2": "",
    "link": "",
    "location": [35.1412, -90.034182],
    "display_address": "800 Madison Avenue<br />Memphis, TN 38163",
    "address": "800 Madison Avenue",
    "address_maps": "800 Madison Avenue Memphis, TN 38163 [35.1412, -90.034182]",
    "thumb": "",
    "thumb_using_id": "9802",
    "image": false,
    "description": "STUDENTS ONLY<br />Open Access Lab, Card Swipe 24/7<br />Card Swipe access to building 24/7<br />20 Computers<br />2 Printers",
    "type": "labs",
    "id": "9802",
    "tags": ""
},{	"name":			"66 Pauline Annex",
    "analytics_name": "66pauline-annex",
    "name2": "",
    "link": "",
    "location": [35.142073, -90.027342],
    "display_address": "66 N. Pauline Street<br />Memphis, TN 38163",
    "address": "66 N. Pauline Street",
    "address_maps": "66 N. Pauline Street Memphis, TN 38163 [35.142073, -90.027342]",
    "thumb": "",
    "thumb_using_id": "2182",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2182",
    "tags": ""
},{	"name":			"740 Court",
    "analytics_name": "740-court",
    "name2": "",
    "link": "",
    "location": [35.142218, -90.036151],
    "display_address": "740 Court Avenue<br />Memphis, TN 38105",
    "address": "740 Court Avenue",
    "address_maps": "740 Court Avenue Memphis, TN 38105 [35.142218, -90.036151]",
    "thumb": "",
    "thumb_using_id": "2606",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2606",
    "tags": ""
},{	"name":			"910 Madison",
    "analytics_name": "madison-910",
    "name2": "",
    "link": "",
    "location": [35.140625, -90.030507],
    "display_address": "910 Madison Avenue<br />Memphis, TN 38163",
    "address": "910 Madison Avenue",
    "address_maps": "910 Madison Avenue Memphis, TN 38163 [35.140625, -90.030507]",
    "thumb": "",
    "thumb_using_id": "2242",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2242",
    "tags": ""
},{	"name":			"920 Madison",
    "analytics_name": "madison-920",
    "name2": "",
    "link": "",
    "location": [35.141235, -90.03011],
    "display_address": "920 Madison Avenue<br />Memphis, TN 38163",
    "address": "920 Madison Avenue",
    "address_maps": "920 Madison Avenue Memphis, TN 38163 [35.141235, -90.03011]",
    "thumb": "",
    "thumb_using_id": "2275",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2275",
    "tags": ""
},{	"name":			"930 Madison",
    "analytics_name": "madison-930",
    "name2": "",
    "link": "",
    "location": [35.140616, -90.029714],
    "display_address": "930 Madison Avenue<br />Memphis, TN 38163",
    "address": "930 Madison Avenue",
    "address_maps": "930 Madison Avenue Memphis, TN 38163 [35.140616, -90.029714]",
    "thumb": "",
    "thumb_using_id": "2243",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2243",
    "tags": ""
},{	"name":			"Alexander",
    "analytics_name": "alexander",
    "name2": "Lamar",
    "link": "",
    "location": [35.140173, -90.031881],
    "display_address": "877 Madison Avenue<br />Memphis, TN 38163",
    "address": "877 Madison Avenue",
    "address_maps": "877 Madison Avenue Memphis, TN 38163 [35.140173, -90.031881]",
    "thumb": "",
    "thumb_using_id": "2186",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2186",
    "tags": ""
},{	"name":			"Boling Center for Developmental Disabilities (BCDD)",
    "analytics_name": "bcdd",
    "name2": "",
    "link": "",
    "location": [35.142678, -90.037041],
    "display_address": "711 Jefferson Avenue<br />Memphis, TN 38105",
    "address": "711 Jefferson Avenue",
    "address_maps": "711 Jefferson Avenue Memphis, TN 38105 [35.142678, -90.037041]",
    "thumb": "",
    "thumb_using_id": "2167",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2167",
    "tags": ""
},{	"name":			"Cancer Research",
    "analytics_name": "cancer",
    "name2": "",
    "link": "",
    "location": [35.140204, -90.036108],
    "display_address": "19 South Manassas<br />Memphis, TN 38103",
    "address": "19 South Manassas",
    "address_maps": "19 South Manassas Memphis, TN 38103 [35.140204, -90.036108]",
    "thumb": "",
    "thumb_using_id": "2125",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2125",
    "tags": ""
},{	"name":			"Coleman",
    "analytics_name": "coleman",
    "name2": "",
    "link": "",
    "location": [35.142077, -90.029477],
    "display_address": "956 Court Avenue<br />Memphis, TN 38163",
    "address": "956 Court Avenue",
    "address_maps": "956 Court Avenue Memphis, TN 38163 [35.142077, -90.029477]",
    "thumb": "",
    "thumb_using_id": "2116",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2116",
    "tags": ""
},{	"name":			"Crowe Research",
    "analytics_name": "crowe",
    "name2": "",
    "link": "",
    "location": [35.138642, -90.032299],
    "display_address": "874 Union Avenue<br />Memphis, TN 38163",
    "address": "874 Union Avenue",
    "address_maps": "874 Union Avenue Memphis, TN 38163 [35.138642, -90.032299]",
    "thumb": "",
    "thumb_using_id": "2105",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2105",
    "tags": ""
},{	"name":			"Docs Fields Pavilion",
    "analytics_name": "docs-field",
    "name2": "",
    "link": "",
    "location": [35.136067, -90.031768],
    "display_address": "201 East Street<br />Memphis, TN 38163",
    "address": "201 East Street",
    "address_maps": "201 East Street Memphis, TN 38163 [35.136067, -90.031768]",
    "thumb": "",
    "thumb_using_id": "2196",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2196",
    "tags": ""
},{	"name":			"Doctors Office Building",
    "analytics_name": "66pauline",
    "name2": "",
    "link": "",
    "location": [35.141674, -90.027342],
    "display_address": "66 N. Pauline Street<br />Memphis, TN 38163",
    "address": "66 N. Pauline Street",
    "address_maps": "66 N. Pauline Street Memphis, TN 38163 [35.141674, -90.027342]",
    "thumb": "",
    "thumb_using_id": "2181",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2181",
    "tags": ""
},{	"name":			"Dudley Street Building",
    "analytics_name": "dudley",
    "name2": "",
    "link": "",
    "location": [35.136624, -90.02922],
    "display_address": "208 Dudley Street South<br />Memphis, TN 38104",
    "address": "208 Dudley Street South",
    "address_maps": "208 Dudley Street South Memphis, TN 38104 [35.136624, -90.02922]",
    "thumb": "",
    "thumb_using_id": "2199",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2199",
    "tags": ""
},{	"name":			"Dunn",
    "analytics_name": "dunn",
    "name2": "",
    "link": "",
    "location": [35.138024, -90.032605],
    "display_address": "875 Union Avenue<br />Memphis, TN 38163",
    "address": "875 Union Avenue",
    "address_maps": "875 Union Avenue Memphis, TN 38163 [35.138024, -90.032605]",
    "thumb": "",
    "thumb_using_id": "2110",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2110",
    "tags": ""
},{	"name":			"General Education Building (GEB)",
    "analytics_name": "geb",
    "name2": "",
    "link": "",
    "location": [35.14032, -90.033334],
    "display_address": "8 S. Dunlap Street<br />Memphis, TN 38163",
    "address": "8 S. Dunlap Street",
    "address_maps": "8 S. Dunlap Street Memphis, TN 38163 [35.14032, -90.033334]",
    "thumb": "",
    "thumb_using_id": "2175",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2175",
    "tags": ""
},{	"name":			"GEB parking (E lot)",
    "analytics_name": "",
    "name2": "",
    "link": "",
    "location": [35.140134, -90.032476],
    "display_address": "869 Madison Avenue<br />Memphis, TN 38163",
    "address": "869 Madison Avenue",
    "address_maps": "869 Madison Avenue Memphis, TN 38163 [35.140134, -90.032476]",
    "thumb": "",
    "thumb_using_id": "2118",
    "image": false,
    "description": "",
    "type": "pkng",
    "id": "2118",
    "tags": ""
},{	"name":			"Hyde",
    "analytics_name": "hyde",
    "name2": "",
    "link": "",
    "location": [35.142599, -90.03805],
    "display_address": "<br />Memphis, TN ",
    "address": "",
    "address_maps": " Memphis, TN  [35.142599, -90.03805]",
    "thumb": "",
    "thumb_using_id": "2171",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2171",
    "tags": ""
},{	"name":			"Hyman",
    "analytics_name": "hyman",
    "name2": "",
    "link": "",
    "location": [35.138849, -90.033383],
    "display_address": "62 S. Dunlap Street<br />Memphis, TN 38163",
    "address": "62 S. Dunlap Street",
    "address_maps": "62 S. Dunlap Street Memphis, TN 38163 [35.138849, -90.033383]",
    "thumb": "",
    "thumb_using_id": "2101",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2101",
    "tags": ""
},{	"name":			"Johnson",
    "analytics_name": "johnson",
    "name2": "",
    "link": "",
    "location": [35.139309, -90.033415],
    "display_address": "847 Monroe Avenue<br />Memphis, TN 38163",
    "address": "847 Monroe Avenue",
    "address_maps": "847 Monroe Avenue Memphis, TN 38163 [35.139309, -90.033415]",
    "thumb": "",
    "thumb_using_id": "2109",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2109",
    "tags": ""
},{	"name":			"Link",
    "analytics_name": "link",
    "name2": "",
    "link": "",
    "location": [35.139239, -90.032669],
    "display_address": "855 Monroe Avenue<br />Memphis, TN 38163",
    "address": "855 Monroe Avenue",
    "address_maps": "855 Monroe Avenue Memphis, TN 38163 [35.139239, -90.032669]",
    "thumb": "",
    "thumb_using_id": "2194",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2194",
    "tags": ""
},{	"name":			"Madison Plaza",
    "analytics_name": "madison-plaza",
    "name2": "",
    "link": "",
    "location": [35.140779, -90.030186],
    "display_address": "920 Madison Avenue<br />Memphis, TN 38163",
    "address": "920 Madison Avenue",
    "address_maps": "920 Madison Avenue Memphis, TN 38163 [35.140779, -90.030186]",
    "thumb": "",
    "thumb_using_id": "2120",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2120",
    "tags": ""
},{	"name":			"Molecular Sciences",
    "analytics_name": "msb",
    "name2": "",
    "link": "",
    "location": [35.140963, -90.0326],
    "display_address": "858 Madison Avenue<br />Memphis, TN 38163",
    "address": "858 Madison Avenue",
    "address_maps": "858 Madison Avenue Memphis, TN 38163 [35.140963, -90.0326]",
    "thumb": "",
    "thumb_using_id": "2129",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2129",
    "tags": ""
},{	"name":			"Mooney",
    "analytics_name": "mooney",
    "name2": "",
    "link": "",
    "location": [35.138932, -90.032106],
    "display_address": "875 Monroe Avenue<br />Memphis, TN 38163",
    "address": "875 Monroe Avenue",
    "address_maps": "875 Monroe Avenue Memphis, TN 38163 [35.138932, -90.032106]",
    "thumb": "",
    "thumb_using_id": "2104",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2104",
    "tags": ""
},{	"name":			"Nash",
    "analytics_name": "nash-research",
    "name2": "",
    "link": "",
    "location": [35.138581, -90.031393],
    "display_address": "894 Union Avenue<br />Memphis, TN 38163",
    "address": "894 Union Avenue",
    "address_maps": "894 Union Avenue Memphis, TN 38163 [35.138581, -90.031393]",
    "thumb": "",
    "thumb_using_id": "2107",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2107",
    "tags": ""
},{	"name":			"Nash Annex",
    "analytics_name": "nash-annex",
    "name2": "",
    "link": "",
    "location": [35.138827, -90.031548],
    "display_address": "894 Union Avenue<br />Memphis, TN 38163",
    "address": "894 Union Avenue",
    "address_maps": "894 Union Avenue Memphis, TN 38163 [35.138827, -90.031548]",
    "thumb": "",
    "thumb_using_id": "2147",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2147",
    "tags": ""
},{	"name":			"Pharmacy",
    "analytics_name": "pharmacy",
    "name2": "",
    "link": "",
    "location": [35.139958, -90.031312],
    "display_address": "881 Madison Avenue<br />Memphis, TN 38163",
    "address": "881 Madison Avenue",
    "address_maps": "881 Madison Avenue Memphis, TN 38163 [35.139958, -90.031312]",
    "thumb": "",
    "thumb_using_id": "2198",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2198",
    "tags": ""
},{	"name":			"Phi Chi Fraternity",
    "analytics_name": "phichi",
    "name2": "",
    "link": "",
    "location": [35.143121, -90.037857],
    "display_address": "687 Jefferson Avenue<br />Memphis, TN 38105",
    "address": "687 Jefferson Avenue",
    "address_maps": "687 Jefferson Avenue Memphis, TN 38105 [35.143121, -90.037857]",
    "thumb": "",
    "thumb_using_id": "2170",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2170",
    "tags": ""
},{	"name":			"Physical Plant Shops",
    "analytics_name": "physical-plant-shop",
    "name2": "",
    "link": "",
    "location": [35.136681, -90.031688],
    "display_address": "201 East Street<br />Memphis, TN 38163",
    "address": "201 East Street",
    "address_maps": "201 East Street Memphis, TN 38163 [35.136681, -90.031688]",
    "thumb": "",
    "thumb_using_id": "2188",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2188",
    "tags": ""
},{	"name":			"Purchasing and Physical Plant",
    "analytics_name": "physical-plant-purchasing",
    "name2": "",
    "link": "",
    "location": [35.13662, -90.031258],
    "display_address": "201 East Street<br />Memphis, TN 38163",
    "address": "201 East Street",
    "address_maps": "201 East Street Memphis, TN 38163 [35.13662, -90.031258]",
    "thumb": "",
    "thumb_using_id": "2180",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2180",
    "tags": ""
},{	"name":			"Student-Alumni Center (SAC)",
    "analytics_name": "sac",
    "name2": "",
    "link": "",
    "location": [35.141393, -90.034407],
    "display_address": "800 Madison Avenue<br />Memphis, TN 38163",
    "address": "800 Madison Avenue",
    "address_maps": "800 Madison Avenue Memphis, TN 38163 [35.141393, -90.034407]",
    "thumb": "",
    "thumb_using_id": "2165",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2165",
    "tags": ""
},{	"name":			"Translational Sciences Research Building (TSRB)",
    "analytics_name": "tsrb",
    "name2": "",
    "link": "",
    "location": [35.139309, -90.036237],
    "display_address": "71 South Manassas<br />Memphis, TN 38163",
    "address": "71 South Manassas",
    "address_maps": "71 South Manassas Memphis, TN 38163 [35.139309, -90.036237]",
    "thumb": "",
    "thumb_using_id": "2200",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2200",
    "tags": ""
},{	"name":			"Van Vleet Cancer Center",
    "analytics_name": "vanvleet",
    "name2": "",
    "link": "",
    "location": [35.141121, -90.033726],
    "display_address": "3 N. Dunlap Street<br />Memphis, TN 38163",
    "address": "3 N. Dunlap Street",
    "address_maps": "3 N. Dunlap Street Memphis, TN 38163 [35.141121, -90.033726]",
    "thumb": "",
    "thumb_using_id": "2113",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2113",
    "tags": ""
},{	"name":			"Variety",
    "analytics_name": "variety",
    "name2": "",
    "link": "",
    "location": [35.142064, -90.035689],
    "display_address": "45 N. Manassas Street<br />Memphis, TN 38163",
    "address": "45 N. Manassas Street",
    "address_maps": "45 N. Manassas Street Memphis, TN 38163 [35.142064, -90.035689]",
    "thumb": "",
    "thumb_using_id": "2102",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2102",
    "tags": ""
},{	"name":			"Wittenborg Anatomy",
    "analytics_name": "wittenborg",
    "name2": "",
    "link": "",
    "location": [35.139279, -90.032235],
    "display_address": "875 Monroe Avenue<br />Memphis, TN 38163",
    "address": "875 Monroe Avenue",
    "address_maps": "875 Monroe Avenue Memphis, TN 38163 [35.139279, -90.032235]",
    "thumb": "",
    "thumb_using_id": "2103",
    "image": false,
    "description": "",
    "type": "bldg",
    "id": "2103",
    "tags": ""
},{	"name":			"A Lot",
    "analytics_name": "parking-a",
    "name2": "",
    "link": "",
    "location": [35.139024, -90.033174],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.139024, -90.033174]",
    "thumb": "",
    "thumb_using_id": "9900",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9900",
    "tags": ""
},{	"name":			"F Lot",
    "analytics_name": "parking-f",
    "name2": "",
    "link": "",
    "location": [35.142129, -90.038071],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.142129, -90.038071]",
    "thumb": "",
    "thumb_using_id": "9904",
    "image": false,
    "description": "Student Parking",
    "type": "pkng",
    "id": "9904",
    "tags": ""
},{	"name":			"G Lot",
    "analytics_name": "parking-g",
    "name2": "",
    "link": "",
    "location": [35.142055, -90.034912],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.142055, -90.034912]",
    "thumb": "",
    "thumb_using_id": "9905",
    "image": false,
    "description": "Employee Parking<br />Student Parking",
    "type": "pkng",
    "id": "9905",
    "tags": ""
},{	"name":			"H Lot",
    "analytics_name": "parking-h",
    "name2": "",
    "link": "",
    "location": [35.141103, -90.02914],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.141103, -90.02914]",
    "thumb": "",
    "thumb_using_id": "9906",
    "image": false,
    "description": "Employee Parking<br />Commercial Parking",
    "type": "pkng",
    "id": "9906",
    "tags": ""
},{	"name":			"I Lot",
    "analytics_name": "parking-i",
    "name2": "",
    "link": "",
    "location": [35.142577, -90.035904],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.142577, -90.035904]",
    "thumb": "",
    "thumb_using_id": "9907",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9907",
    "tags": ""
},{	"name":			"J Lot",
    "analytics_name": "parking-j",
    "name2": "",
    "link": "",
    "location": [35.141806, -90.03709],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.141806, -90.03709]",
    "thumb": "",
    "thumb_using_id": "9908",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9908",
    "tags": ""
},{	"name":			"K Lot",
    "analytics_name": "parking-k",
    "name2": "",
    "link": "",
    "location": [35.136984, -90.031629],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.136984, -90.031629]",
    "thumb": "",
    "thumb_using_id": "9909",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9909",
    "tags": ""
},{	"name":			"M Lot",
    "analytics_name": "parking-m",
    "name2": "",
    "link": "",
    "location": [35.141192, -90.036746],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.141192, -90.036746]",
    "thumb": "",
    "thumb_using_id": "9911",
    "image": false,
    "description": "Student Parking",
    "type": "pkng",
    "id": "9911",
    "tags": ""
},{	"name":			"N Lot",
    "analytics_name": "parking-n",
    "name2": "",
    "link": "",
    "location": [35.137687, -90.032068],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.137687, -90.032068]",
    "thumb": "",
    "thumb_using_id": "9912",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9912",
    "tags": ""
},{	"name":			"O Lot",
    "analytics_name": "parking-o",
    "name2": "",
    "link": "",
    "location": [35.137165, -90.032948],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.137165, -90.032948]",
    "thumb": "",
    "thumb_using_id": "9913",
    "image": false,
    "description": "Dental Clinic Parking",
    "type": "pkng",
    "id": "9913",
    "tags": ""
},{	"name":			"P Lot",
    "analytics_name": "parking-p",
    "name2": "",
    "link": "",
    "location": [35.141674, -90.026908],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.141674, -90.026908]",
    "thumb": "",
    "thumb_using_id": "9914",
    "image": false,
    "description": "Employee Parking<br />Student Parking<br />Commercial Parking",
    "type": "pkng",
    "id": "9914",
    "tags": ""
},{	"name":			"R Lot",
    "analytics_name": "parking-r",
    "name2": "",
    "link": "",
    "location": [35.142042, -90.033678],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.142042, -90.033678]",
    "thumb": "",
    "thumb_using_id": "9915",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9915",
    "tags": ""
},{	"name":			"T Lot",
    "analytics_name": "parking-t",
    "name2": "",
    "link": "",
    "location": [35.136229, -90.033281],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.136229, -90.033281]",
    "thumb": "",
    "thumb_using_id": "9916",
    "image": false,
    "description": "Student Parking",
    "type": "pkng",
    "id": "9916",
    "tags": ""
},{	"name":			"V Lot",
    "analytics_name": "parking-v",
    "name2": "",
    "link": "",
    "location": [35.140996, -90.03522],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.140996, -90.03522]",
    "thumb": "",
    "thumb_using_id": "9917",
    "image": false,
    "description": "Commercial Parking",
    "type": "pkng",
    "id": "9917",
    "tags": ""
},{	"name":			"W Lot",
    "analytics_name": "parking-w",
    "name2": "",
    "link": "",
    "location": [35.138227, -90.033243],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.138227, -90.033243]",
    "thumb": "",
    "thumb_using_id": "9918",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9918",
    "tags": ""
},{	"name":			"X Lot",
    "analytics_name": "parking-x",
    "name2": "",
    "link": "",
    "location": [35.137651, -90.034359],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.137651, -90.034359]",
    "thumb": "",
    "thumb_using_id": "9919",
    "image": false,
    "description": "Employee Parking<br />Student Parking",
    "type": "pkng",
    "id": "9919",
    "tags": ""
},{	"name":			"C Lot",
    "analytics_name": "parking-c",
    "name2": "",
    "link": "",
    "location": [35.137037, -90.032176],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.137037, -90.032176]",
    "thumb": "",
    "thumb_using_id": "9902",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9902",
    "tags": ""
},{	"name":			"E Lot",
    "analytics_name": "parking-e",
    "name2": "",
    "link": "",
    "location": [35.140134, -90.032476],
    "display_address": "<br />,  ",
    "address": "",
    "address_maps": " ,   [35.140134, -90.032476]",
    "thumb": "",
    "thumb_using_id": "9903",
    "image": false,
    "description": "Employee Parking",
    "type": "pkng",
    "id": "9903",
    "tags": ""
}];

function setMarkers(map, locations) {
    for (var i = 0; i < locations.length; i++) {
    // Set up HTML for InfoWindow
    var name = '';
    var name2 = '';
    var address = '';

    var fullName = locations[i].name;
    //if (locations[i].name2) { fullName = fullName + ' (' + locations[i].name2 + ')'};

    // Replace all spaces and slashes with an underscore
    var uid = fullName.replace(/[ \/]/g, '_');
    // Remove anything that's not an alphanumeric character, underscore, or dash
    uid = uid.replace(/[^a-zA-Z0-9_-]/g, '');

    var uid = locations[i].id;
    var imageUrl = '';
    var desc = '';
    var permalink = '<span title="Copy direct link to location" aria-label="Copy direct link to location" class="fa fa-link uthsc-map-link" id="' +
        uid + '" ></span> ';
    if (locations[i].name) {
    name = '<h5>' + permalink + locations[i].name + '</h5><p>'
}
    ;
    if (locations[i].type == "pkng") {
    name = name + locations[i].description
}
    ;
    if (locations[i].type == "labs") {
    name = name + locations[i].description
}
    ;
    if (locations[i].type == "bldg") {
    name = name + locations[i].display_address
}
    ;
    if (locations[i].thumb_using_id) {
    imageUrl =
    '<img ' +
    'class="uthsc-map-pop-up-image"' +
    'src="/map/images/buildings/thumbs/' + locations[i].thumb_using_id + '.jpg"' +
    ' />'
}
    ;
    if (locations[i].description) {
    desc = '<p class="description">' + locations[i].description + '</p>'
}
    ;
    address = '<div id="directions_container">' +
    '<p>Directions:&emsp;' +
    '<a href="#" ' +
    'id="to_here_link" ' +
    'onclick="_gaq.push([' +
    '"_trackEvent", ' +
    '"Map", ' +
    '"Info Window", "To - ' + locations[i].analytics_name + '"' +
    ']);' +
    '">To here</a>&emsp;|&emsp;' +
    '<a href="#" id="from_here_link" ' +
    'onclick="_gaq.push([' +
    '"_trackEvent", ' +
    '"Map", ' +
    '"Info Window", "From - ' + locations[i].analytics_name + '"' +
    ']);' +
    '">From here</a>' +
    '</p>' +
    '<div id="directions_form">' +
    '<form ' +
    'action="https://maps.google.com/maps" ' +
    'method="get">' +
    '<input ' +
    'id="hidden_dir" ' +
    'type="hidden" ' +
    'name="daddr" ' +
    'value="' + locations[i].location + '">' +
    '<input ' +
    'id="visible_dir" ' +
    'type="text" ' +
    'placeholder="Start address" ' +
    'name="saddr">' +
    '<input ' +
    'class="submit" ' +
    'type="submit" ' +
    'value="GO" ' +
    'onclick="_gaq.push([' +
    '"_trackEvent", ' +
    '"Map", ' +
    '"Info Window", ' +
    '"DirGo - ' + locations[i].analytics_name + '"' +
    ']);">' +
    '</form>' +
    '</div>' +
    '</div>';
    // Create Locations Markers

    locationsMarkers[i] = new google.maps.Marker({
    title: locations[i].name,
    position: new google.maps.LatLng(locations[i].location[0], locations[i].location[1]),
    clickable: true,
    draggable: false,
    map: map,
    html: '<div style="width:326px;">' +
    '<div id="bodyContent">' + imageUrl +
    name + address + '' +
    '</div>' +
    '</div>',
    icon: new google.maps.MarkerImage(
    '//www.uthsc.edu/map/images/' + locations[i].type + '.png',
    new google.maps.Size(16, 28),
    new google.maps.Point(0, 0),
    new google.maps.Point(6, 20)
    ),
    fullName: fullName,
    id: uid
});
    // Set up Click Event on Markers
    google.maps.event.addListener(locationsMarkers[i], "click", function () {
    map.panTo(this.position);
    details.setContent(this.html);
    details.open(map, this);
});
    // Create sidebar lists and append in sidebar
    var list = locations[i].type;
    var tags = '';
    if (locations[i].tags) {
    tags = '<!-- ' + locations[i].tags + '-->'
}
    ;
    var li = jQuery(
    '<li>' +
    '<a href="javascript:scrollToMarker(\'' + locationsMarkers[i].id + '\')">' +
    locationsMarkers[i].fullName + tags +
    '</a>' +
    '</li>'
    );
    jQuery('h6.' + list).next('div').children('ul').append(li);

    //Use to get precise coordinates when draggable = true
    //google.maps.event.addListener(locationsMarkers[i], "dragend", function () {
    //	console.log(this.getPosition().toUrlValue());
    //});
}
}

function getCenter(location) {
    for (var i = 0; i < locationsMarkers.length; i++) {
    if (locationsMarkers[i].id == location) {
    var center = locationsMarkers[i].position;
    return center;
} else {
    var center = new google.maps.LatLng(35.1393278, -90.0320579);
}
}
    return center;
}

function scrollToMarker(location) {
    for (var i = 0; i < locationsMarkers.length; i++) {
    if (locationsMarkers[i].id == location) {
    map.panTo(locationsMarkers[i].position);
    details.setContent(locationsMarkers[i].html);
    details.open(map, locationsMarkers[i]);
    if (locationsMarkers[i].getMap() == null) {
    toggleLocations(locations[i].type);
    $("." + locations[i].type + " a.button").toggleClass("markers_off");
}
    //Shadowbox.setup('a.shadowbox');
}
}
}

function toggleLocations(which) {
    jQuery('.check.' + which).toggleClass("unchecked");
    for (var i = 0; i < locationsMarkers.length; i++) {
    var type = locations[i].type;
    if (which == type) {
    if (locationsMarkers[i].getMap() != null) {
    locationsMarkers[i].setMap(null);
} else {
    locationsMarkers[i].setMap(map);
}
}
}
}

function initialize() {
    // Initialize new google map
    map = new google.maps.Map(document.getElementById("map_canvas"));
    // Set initial zoom level
    map.setZoom(17);
    // Set map type {roadmap, satellite, terrain}
    map.setMapTypeId('roadmap');
    // Set location markers
    setMarkers(map, locations);
    toggleLocations('labs');
    // Get Querystring from the page URL
    var locationID = unescape(location.search.substring(1));
    // Get map center from default or querystring if present
    var center = getCenter(locationID);
    // Set map center
    map.setCenter(center);

    if (navigator.geolocation) {
    var meMarker = null;
    navigator.geolocation.watchPosition(function (position) {
    var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    if (meMarker == null) {
    meMarker = new google.maps.Marker({
    position: myLatlng,
    map: map
});
    meMarker.setMap(map);
} else {
    meMarker.setPosition(myLatlng);
}
});
} else {
    error('Geo Location is not supported');
}


    // Set default infowindow content
    details = new google.maps.InfoWindow({
    content: "loading...",
    // And max-width
    maxWidth: 350
});
    // Open InfoWindow from URL
    scrollToMarker(locationID);
    // Close infowindows when map clicked
    google.maps.event.addListener(map, "click", function () {
    if (details) {
    details.close();
}
});

    jQuery(".buildings").click(function (evt) {
    // Set up locations check marks
    // Prevent check marks from activating accordion
    evt.stopPropagation();
    // Get first class name of check mark
    var which = jQuery(this).attr('class').split(' ')[0];
    // Toggle location markers based on check mark class name
    toggleLocations(which);
});
    // Set up parking check marks
    jQuery("ul.parking .check").click(function (evt) {
    // Prevent check marks from activating accordion
    evt.stopPropagation();
    // Get first class name of check mark
    var which = jQuery(this).attr('class').split(' ')[0];
    // Toggle parking markers based on check mark class name
    toggleParking(which);
});
}

//====================================================
google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.addDomListener(window, "resize", function () {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center);
});


//====================================================
var is_ios = /(iPad|iPhone|iPod)/g.test(navigator.userAgent);


if (is_ios) {
    $(' <link rel="stylesheet" type="text/css" href="/map/css/ios.css"/>').appendTo("head");
}
;
/* ]]> */