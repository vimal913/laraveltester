<html>

   <head>
      <title>{{session()->get('topic')}}</title>
   </head>

   <body>
      <form action = "{{route('register')}}" method = "post">
        @csrf
         <!-- <input type = "hidden" name = "_token" value = "<?php //echo csrf_token() ?>"> -->
      
         <table>
            <tr>
               <td>Name</td>
               <td><input type = "text" name = "name" /></td>
            </tr>
            <tr>
               <td>Username</td>
               <td><input type = "text" name = "username" /></td>
            </tr>
            <tr>
               <td>Password</td>
               <td><input type = "password" name = "password" /></td>
            </tr>
            <tr>
               <td>language</td>
               <td><input type="radio" id="html" name="fav_language" value="HTML">
                   <label for="html">HTML</label><br>
                   <input type="radio" id="css" name="fav_language" value="CSS">
                   <label for="css">CSS</label><br>
               </td>
            </tr>
            <tr>
               <td>Bikes</td>
               <td>
                  <input type="checkbox" id="vehicle1" name="vehicle[]" value="Bike">
                  <label for="vehicle1"> I have a bike</label><br>
                  <input type="checkbox" id="vehicle2" name="vehicle[]" value="Car">
                  <label for="vehicle2"> I have a car</label><br>
                  <input type="checkbox" id="vehicle3" name="vehicle[]" value="Boat">
                  <label for="vehicle3"> I have a boat</label>
               </td>
            </tr>
            <tr>
               <td>Select a File:</td>
               <td><input type="file" id="myfile" name="myfile"></td>
            </tr>
            <tr>
               <td colspan = "2" align = "center">
                  <input type = "submit" value = "Register" />
               </td>
            </tr>
         </table>
      
      </form>
   </body>
</html>