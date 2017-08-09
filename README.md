# Validator

This task contain general validation for some strings format like json array and xml
the main idea is to convert these types to one type and deal with it.
so I convert them to array and then I use the array to check the specific requirement.

in future if you want to and new type just add new class with load method which convert the 
type of the string to array.

the validator class and it's child is general classes and any one can use it.
the Transaction class not a general class it's built to deal with the bushiness requirement
so it can be change from company to another one


# How to run the code :
1) install it
2) you will see the test files (array,json,xml) these files test the happy scenarios
and (invalidXml,invalidJsonStructure) files test the faild scenarios
3) open you localhost and run the index.php file in your braowser