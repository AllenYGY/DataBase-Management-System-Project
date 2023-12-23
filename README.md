# Courier Station Information Management System

## Assumption

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
2. **Courier Station Information Management**: Allow courier station manager to update their personal information, including address, contact details, etc.

### For the administrator

1. **员工管理**：跟踪员工的工作表现，包括送货效率和客户评价。

2. **客户服务**：查看并回应客户评价，处理投诉和建议。

3. **数据分析**：生成报告，分析快递站的运营效率，比如送货时间、客户满意度等。

4. **财务管理**：管理订单的财务流水，包括支付处理和收入报告。

5. **系统安全**：确保系统安全，保护客户和公司数据不受未经授权的访问。

### 技术需求：

1. **多平台访问**：系统应该支持多种设备访问，如电脑、平板和手机。

2. **用户界面**：直观、易于导航的用户界面，以提高用户体验。

3. **系统集成**：与其他系统集成，如支付网关和物流追踪服务。

4. **数据备份**：定期备份数据，以防系统崩溃或数据损失。

5. **可扩展性**：系统设计应能支持业务增长和扩展功能。

![Pick-Send Process](Project/Draw/process.png)

## E-R Diagram

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
