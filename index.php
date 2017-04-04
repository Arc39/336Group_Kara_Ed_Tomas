<!DOCTYPE html>
<html>
    <head>
        <title>Makeup Catalog</title>
        <style>
            @import url("assets/style.css");
        </style>
    </head>
    <body>
        <div id = "wrapper">
            <h3>Makeup Catalog</h3>
            <form>
                search for: 
                <input type="text" name="brandName"/>
                category: 
                <select name="brandType">
                    <option value="">Select One</option>
                          //<?php
                          //       $ = getDeviceTypes();
                          //       foreach ($deviceTypes as $deviceType) {
                          //           echo "<option>" . $deviceType['deviceType'] ." </option>";
                          //       }
                          //     ?>
                    </select>
                <input type="checkbox" name="status" id="status"/>
                <label for="status">Check Availability</label>
                <br>
                Order By Price
                <br>
                <input type="radio" name="order" value="acs" id="cpcAcs"><label for="cpcAcs">low to high</label>
                <input type="radio" name="order" value="dec" id="cpcDec"><label for="cpcDec">high to low</label>
                    
                <br>
                <input type="submit" value="Search" />
            </form>
        </div>
    </body>
</html>