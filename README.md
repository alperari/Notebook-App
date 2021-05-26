# Notebook App

College students used to sell their notes that they took during lectures. This trade was often made by hand to hand. Nevertheless, Notebook-App is a web application in which students can easily buy and sell course materials online. No need to do this interchange face-to-face.

> Implemented by MySQL and PHP.

> This program works only on local device, no any other backend service is implemented.



###### Main branch has upload file option instead of URL text field in sell.php . Uploading file is not implemented yet.



## User Flow

###### Login 

![image](https://user-images.githubusercontent.com/68128434/119728027-ab5a2a80-be7b-11eb-97fd-45cbd86b2315.png)

As you successfully log in, the session gets deployed. This session contains your personal information and it is carried to every page you switch. 



###### Register

![image](https://user-images.githubusercontent.com/68128434/119728218-dfcde680-be7b-11eb-89e2-125d41bf43e6.png)



###### Marketplace

![image](https://user-images.githubusercontent.com/68128434/119730287-3a684200-be7e-11eb-9dbb-57a84fb0bbc9.png)

You can filter the listing from left-hand-side buttons by course name. Or order by descending/ascending price. 

Also you can't add an item twice.

![image](https://user-images.githubusercontent.com/68128434/119729224-148e6d80-be7d-11eb-88a3-a894f099df21.png)





###### Sell

![image](https://user-images.githubusercontent.com/68128434/119730046-f9702d80-be7d-11eb-90fe-4d6113e0dcb4.png)

Note that since i am the owner of SPS303 notes I can't add it into my cart.





###### My Cart

![3](https://user-images.githubusercontent.com/68128434/119728921-aea1e600-be7c-11eb-83a5-17dc125f9bb4.JPG)

If you are done with your orderings, press "Order!":

![image](https://user-images.githubusercontent.com/68128434/119729300-2d971e80-be7d-11eb-8bea-b179e2e46bda.png)





###### Previous Orders

![image](https://user-images.githubusercontent.com/68128434/119729412-4dc6dd80-be7d-11eb-870f-1c53e5f6c8f1.png)

You can display your purchase history in this page. Orders are added automatically. Cannot be modified.





###### Profile Page

![image](https://user-images.githubusercontent.com/68128434/119729857-cc237f80-be7d-11eb-9c28-2e0516a2b0c3.png)

You can modify your personal information. You don't have to fill all input text fields. Only those filled will change corresponding information.



###### Admin Panel

![Capture](https://user-images.githubusercontent.com/68128434/119730980-0ccfc880-be7f-11eb-8bd4-7dae68dfc1fc.JPG)

Admin can manage users, products, orders.