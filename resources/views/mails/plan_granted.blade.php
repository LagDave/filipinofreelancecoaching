<h1 style='color: #e60c3e'>Congratulations, {{ucwords($user->first_name)}} {{ucwords($user->last_name)}}</h1>
<h3>Your application for a <span style='color: #e60c3e'>{{strtoupper($user->plan_name)}}</span> plan has been granted by the admins.</h3> 

<br>
<p>You can now check out:</p>
<ul>
  <li>
    <a href="https://www.thefilipinofreelancecoaching.com/courses">
      100+ Courses
    </a>
  </li>
  <li>
    <a href="https://www.thefilipinofreelancecoaching.com/home/cheat_sheet">
      Cheat Sheet
    </a>
  </li>
  <li>
    Softwares, Ebooks and Templates <small><i>from another email you will receive from the admins shortly</i></small>
  </li>
</ul>
<br>
<p>Before anything else, please check out our <a href="https://www.thefilipinofreelancecoaching.com/home/policies">Policies</a> first.</p>
<br>
<br>
<b>Plan Details</b>
<p>Name: <b>{{$user->plan_name}}</b></p>
<p>Started at: <b>{{$user->subscription_start}}</b></p>
<p>Will expire in: <b>{{$user->subscription_end}}</b></p>

<hr>
<i>
  <p>Got any questions? Email us at <a href="mailto:admin@thefilipinofreelancecoaching.com">admin@thefilipinofreelancecoaching.com</a>. Or message us on our <a href="https://web.facebook.com/filipinofreelancecoaching/">Facebook Page</a>.</p>
</i>
<hr>