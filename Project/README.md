# Courier Station Information Management System

## User Requirement

## E-R Diagram

![ER](Draw/E-R.png)
![ER-without attribute](Draw/E-R(without_attribute).png)
![Pick-Send Process](Draw/process.png)

## Logical Design

In our user requirement the 3 different kinds of users should be disjoint and total participation.

- For the Entity part

$\therefore$ we can get 3 relationship sets about the user according the method in logical design.

- $customer$
- $courier\_adminstrator$
- $adminstrator$
  
And for each entity we can get one relationship set

- $parcel$
- $courier\_station$
- $logistics\_company$
- $address$
- $contact$

- For the relationship part

We have 9 relationship in our system

- $pick$  $\ Case IX$
- $send$  $\ Case IX$
- $manage$  $\ Case X$
- $belong$  $\ Case X$
- $control$ $\ Case X$
- $locate$ $\ Case VIII$
- $touch$ $\ Case X$

For above case we could not to create table.

- $Carry$ $\ Case III$
- $transfer$ $\ Case III$

$admin=\{uID,uphone,umail,uname,upassword,ugender,upicture\}$
$cadmin=\{uID,uphone,umail,uname,upassword,ugender,upicture,csID\}$
$customer=\{uID,uphone,umail,uname,upassword,ugender,upicture\}$

$parcel=\{parcelID,volume,weight,status,parcelType,
          send\_address,pick\_address,send\_storage\_time,send\_time,pick\_storage\_time,
          pick\_time,cust\_send\_ID,cust\_pick\_ID,cadminID,\}$
$courier\_station=\{csID,start\_time,csphone,csemail,csaddress,end\_time,adminID\}$
$logistics\_company=\{lsID,lsname,lsemail\}$
$address=\{csaddress,csID\}$
$carry=\{lsID,parcelID\}$
$transfer=\{csaddress,lcID\}$

## Normalization

After the logical design the schemas in our database have already satisfed 1NF

Now let's continue to normalize the schema.

For these 3 user tables they have similar attributes

$admin=\{\underline{uID,phone,mail,}name,password,gender,picture\}$
$cadmin=\{\underline{uID,phone,mail},name,password,gender,picture,csID\}$
$customer=\{\underline{uID,phone,mail},name,password,gender,picture\}$

$\therefore$ So let's just talk about one of them.

We can get the following function dependency.

$uID \rightarrow \{email,phone,name,password,gender,picture\}$

$uID$ is obviously candicate key it can hold the whole schema.

$email \rightarrow \{password,gender,picture\}$

$phone \rightarrow \{password,gender,picture\}$

$email$ and $phone$ can hold the attribute $password,gender,picture$, respectively.

So it is easily to find that the schema not in BCNF

$\because$
$email \rightarrow \{password,gender,picture\}$
$phone \rightarrow \{password,gender,picture\}$

but uemail and uphone are not superkey.

so we do this decomposition to the schema.

Decomposition

$phone=\{\underline{phone},uID\}$
$mail=\{\underline{mail},uID\}$
$admin=\{\underline{uID}name,password,gender,picture\}$
$cadmin=\{\underline{uID},name,password,gender,picture,csID\}$
$customer=\{\underline{uID},name,password,gender,picture\}$

This obviously satisfies the BCNF.

For the Courier station schema

$courier\_station=\{csID,start\_time,csphone,email,end\_time,adminID\}$

It has the follwing functional dependency

$csID\rightarrow \{start\_time,csphone,csemail,end\_time,adminID\}$

It can also be decomposited It can also be decomposited just like last slide.

$courier\_station=\{csID,start\_time,end\_time,adminID\}$
$csphone=\{\underline{csphone},csID\}$
$csmail=\{\underline{csmail},csID\}$

The next schema is about the parcel.

$parcel=\{parcelID,volume,weight,status,parcelType,
          send\_address,pick\_address,send\_storage\_time,send\_time,pick\_storage\_time,
          pick\_time,cust\_send\_ID,cust\_pick\_ID,cadminID\}$

We can get the following function dependency like this.

$parcelID \rightarrow \{volume,weight,status,parcelType,
          send\_address,pick\_address,send\_storage\_time,send\_time,pick\_storage\_time,
          pick\_time,cust\_send\_ID,cust\_pick\_ID,cadminID\}$

We can find it has been already satisfy the BCNF.

$logistics\_company=\{lsID,lsname,lsemail\}$

For the rest of the schema we can find it only has 2 attributes. So it must satisfy BCNF.

$address=\{csaddress,csID\}$
$carry=\{lsID,parcelID\}$
$transfer=\{csaddress,lcID\}$
