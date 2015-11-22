<h3>Register</h3>
<form method="POST">
    <label class="label label-info" for="username">Name</label>
    <input type="text" class="form-control" name="username" id="username" />

    <label class="label label-info" for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" />

    <label class="label label-info" for="firstName">First name</label>
    <input type="text" class="form-control" name="firstName" id="firstName" />

    <label class="label label-info" for="lastName">Last name</label>
    <input type="text" class="form-control" name="lastName" id="lastName" />

    <label class="label label-info" for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email" />

    <label class="label label-info" for="gender">Gender</label>
    <select class="form-control" name="gender" id="gender">
        <option>Female</option>
        <option>Male</option>
        <option>Organization</option>
    </select>

    <input type="submit" name="register" value="Registration" class="btn-info" />

</form>