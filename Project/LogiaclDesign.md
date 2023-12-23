# Logical Design

In our user requirement the 3 different kinds of users should be disjoint and total participation.

For the Entity part

we can get 3 relationship sets about the user according to the method in logical design.

- $customer$
- $courier\_adminstrator$*(courier_adminstrator)*
- $admin$*(adminstrator)*
  
And for each entity we can get one relationship set

- $parcel$
- $courier\_station$
- $logistics\_company$
- $address$
- $rating$

For the relationship part, we have 8 relationship in our system.

- $pick$  $\ Case IX$
- $send$  $\ Case IX$
- $manage$  $\ Case X$
- $belong$  $\ Case X$
- $control$ $\ Case X$
- $evaluate$ $\ Case VIII$

For above case we could not to create table.

- $carry$ $\ Case III$
- $transfer$ $\ Case III$

$admin=\{uID,uphone,umail,uname,upassword,ugender,upicture\}$
$cadmin=\{uID,uphone,umail,uname,upassword,ugender,upicture,csID\}$
$customer=\{uID,uphone,umail,uname,upassword,ugender,upicture\}$

$parcel=\{parcelID,volume,weight,status,parcelType,
          send\_address,pick\_address,send\_storage\_time,send\_time,pick\_storage\_time,
          pick\_time,cust\_send\_ID,cust\_pick\_ID,cadminID,\}$
$courier\_station=\{csID,start\_time,csphone,csemail,csaddress,end\_time,adminID\}$
$rating=\{ratingID,rating\_time,score,uID\}$
$logistics\_company=\{lsID,lsname,lsemail\}$
$address=\{csaddress,csID\}$
$carry=\{lsID,parcelID\}$
$transfer=\{csaddress,lcID\}$
