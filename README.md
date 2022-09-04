# crud_modal

### Update user
![Screenshot](img/crud_modal1.png)


```
 $().ready(function() {
  $('.editbtn').on('click', function() {
   $('#editmodal').modal('show');

   $tr = $(this).closest('tr');

   var data = $tr.children("td").map(function() {
    return $(this).text();
   }).get();

   $('#update_id').val(data[0]);
   $('#fname').val(data[1]);
   $('#lname').val(data[2]);
   $('#course').val(data[3]);
   $('#contact').val(data[4]);

  });
 })
```

