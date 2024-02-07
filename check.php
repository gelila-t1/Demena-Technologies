<html>
<body>
    
    <form action ="" method="POST" id='modal'>
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-md">
          

            <div class="modal-content">
              <div class="modal-header">
          
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="modalJoin">Join Our Community</p>
              </div>
              <div class="modal-body">
              
               <p class="choose"> <input type="radio" name="ind" id="radioOne" value="Individual" onclick="hideCompany()" > Individual
               <input type="radio" name="ind" id="radioTwo" value="company" onclick="hideIndividuals()"> Company</p>
               <div class="individuals-section">
                <p class="fullName">
                  First Name<span class="companyModal "> Last Name</span>
                </p>
                <input type="text" name= "firstName" class="input" id='name' />
                <input type="text" name= "LastName" class="input2" id='name' />
                <p class="fullName">
                  Phone Number<span class="emailAdress">Email</span>
                </p>
                <input type="text" name= "phoneNumber" class="input" id ='phoneNumber' />
                <input type="text" name= "email" class="input2" id ='email' />
             

              <p class="fullName">
               How long have you been 
                working on this idea?<br>
               <input type = "radio" name="first" value="first" >  1 month - 3 months<br>
                <input type = "radio" name="first" value="second" >  3 months - 6 months<br>
                <input type = "radio" name="first" value="third" >  6 months - 1 year<br>
                <input type = "radio" name="first" value="fourth" > More than a Year<br>
              </p>
              <p class="attach">
                Attach proposal<input type="file"  name='upload' multiple="multiple" id='upload' >
                  </p>
                    
                      <p class="attach">Book Your Presentation<br>
                        <input type="datetime-local" class="calander" />
                      </p>
                    <div id = "error"></div>    
              </div>
              <div class="Company-section">
                <p class="fullName">
                  Company Name
                 </p>
                <input type="text" class="inputCompany" />
              
                <p class="fullName">
                  Phone Number<span class="emailAdress">Company Email</span>
                </p>
                <input type="text" class="input" />
                <input type="text" class="input2" />

                <p class="fullName">
                  How long have you been 
                   working on this idea?<br>
                  <input type = "radio" name="first" value="first" >  1 month - 3 months<br>
                   <input type = "radio" name="first" value="second" >  3 months - 6 months<br>
                   <input type = "radio" name="first" value="third" >  6 months - 1 year<br>
                   <input type = "radio" name="first" value="fourth" > More than a Year<br>
                 </p>
             
              <p class="fullName">
                Attach proposal<input type="file"  name='upload' multiple="multiple" >
                  </p>
                  <p class="attach">
                    Attach Trade Registration <input type="file"  name='upload' multiple="multiple" >
                      </p>
                      <p class="attach">
                       Attach TIN Certificate <input type="file"  name='upload' multiple="multiple">
                          </p>

                          <p class="attach">
                           Attach VAT registration (if Registered)<input type="file"  name='upload' multiple="multiple">
                              </p>
                              
                      <p class="attach">Book Your Presentation<br>
                        <input type="datetime-local" class="calander" /></p>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-default">Submit</Button> 
                  <button type="reset" class="btn btn-default">Clear</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    
              </div> 
            </div>
            </div>
            
          </div>
        </div>
      
      </form>
</body>
</html>