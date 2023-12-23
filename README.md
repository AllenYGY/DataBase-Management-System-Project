# Courier Station Information Management System

## Assumption

1. There is only one courier station in each region.
2. The address in this area is the address of the delivery station.
   - For example, there is a courier station on *XiangZhou,ZhuHai,GuangDong* then the address of this station will be *XiangZhou,ZhuHai,GuangDong*. There will be no additional specific address
3. One courier station may have many courier station manager.

## User Requirement

Since we have different kinds of users, I will describe user requirements by user.

一个快递站信息管理系统应该满足以下基本用户需求，以确保其有效性和用户友好性：

### For the customer

1. **Pick Parcel**: Allows customers to pick a parcel from another customer.
2. **Send Parcel**: Allows customers to send a parcel to another customer.
3. **Parcel Tracking**: Allows customers to view the real-time location and status of their parcel during delivery.
4. **Personal Information Management**: Allow customers to update their personal information,  contact details.
5. **History**: Give customers the ability to view their order history.
6. **Shipping Options**: Choose from different delivery speeds and prices, such as standard, expedited, or timed delivery.
7. **Service Evaluation**: Provide a platform for customers to rate the express service and leave feedback.

### For the courier station manager

1. **Status Update**: Ability to update the delivery status of a package in the system, such as delivered or delayed.
2. **Courier Station Information Management**: Allow courier station manager to update their personal information, contact details, opening hours.
3. **History**: Allow courier station manager the ability to view information on packages that pass through this Courier station

### For the administrator

1. *Station status*: Ability to check the status of all of the courier station in this system.
2. **History**: Ability to view view all package information.

Here is a basic feature about the pick and send parcel.

![Pick-Send Process](Project/Draw/process.png)

CustomerA delivers the package to courier stationA and fills in the address that needs to be delivered, then the manager of courier stationA checks the package and transfers it to courier stationB according to the address, and the manager of courier stationB accepts the package. Finally, CustomerB can pick up the package.

## E-R Diagram

In the user part, the user uses uID to login, we use the ISA relationship to distinguish the user as customer, delivery manager and administrator, and this ISA relationship is not disjoint, which means that all users registered in the system can be more than one identity.

![ER-user](Project/Draw/user.png)

In the parcel section. Each parcel will be sent and picked up by one customer, each customer can send or pick up more than one parcel at the same time, and each parcel has its responsible delivery manager, and corresponding logistic company.

![ER-parcel](Project/Draw/parcel.png)

In the courier station section, we can see that each delivery manager belongs to a courier station, and the administrator of the system can control multiple courier stations. Every courier station has a specific location for the logistics company to transport the parcel to the fixed address.

![ER-courier_station](Project/Draw/courier_station.png)

Finall we can get the ER diagram like this.

![ER](Project/Draw/E-R.png)

## Logical Design

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

## Normalization

After the logical design the schemas in our database have already satisfed 1NF

Now let's continue to normalize the schema.

For these 3 user tables they have similar attributes

$admin=\{\underline{uID,phone,mail,}name,password,gender,picture\}$
$cadmin=\{\underline{uID,phone,mail},name,password,gender,picture,csID\}$
$customer=\{\underline{uID,phone,mail},name,password,gender,picture\}$

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
