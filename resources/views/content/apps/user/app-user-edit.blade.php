@extends('layouts/contentLayoutMaster')

@section('title', 'User Edit')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css'))}}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css'))}}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css'))}}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css'))}}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css'))}}">
@endsection

@section('content')
<!-- users edit start -->
<section class="app-user-edit">
  <div class="card">
    <div class="card-body">
      <ul class="nav nav-pills" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center active"
            id="account-tab"
            data-bs-toggle="tab"
            href="#account"
            aria-controls="account"
            role="tab"
            aria-selected="true"
          >
            <i data-feather="user"></i><span class="d-none d-sm-block">Account</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center"
            id="information-tab"
            data-bs-toggle="tab"
            href="#information"
            aria-controls="information"
            role="tab"
            aria-selected="false"
          >
            <i data-feather="info"></i><span class="d-none d-sm-block">Information</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center"
            id="social-tab"
            data-bs-toggle="tab"
            href="#social"
            aria-controls="social"
            role="tab"
            aria-selected="false"
          >
            <i data-feather="share-2"></i><span class="d-none d-sm-block">Social</span>
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <!-- Account Tab starts -->
        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
          <!-- users edit start -->
          <div class="d-flex mb-2">
            <img
              src="{{asset('images/avatars/7.png')}}"
              alt="users avatar"
              class="user-avatar users-avatar-shadow rounded me-2 my-25 cursor-pointer"
              height="90"
              width="90"
            />
            <div class="mt-50">
              <h4>Eleanor Aguilar</h4>
              <div class="col-12 d-flex mt-1 px-0">
                <label class="btn btn-primary me-75 mb-0" for="change-picture">
                  <span class="d-none d-sm-block">Change</span>
                  <input
                    class="form-control"
                    type="file"
                    id="change-picture"
                    hidden
                    accept="image/png, image/jpeg, image/jpg"
                  />
                  <span class="d-block d-sm-none">
                    <i class="me-0" data-feather="edit"></i>
                  </span>
                </label>
                <button class="btn btn-outline-secondary d-none d-sm-block">Remove</button>
                <button class="btn btn-outline-secondary d-block d-sm-none">
                  <i class="me-0" data-feather="trash-2"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- users edit ends -->
          <!-- users edit account form start -->
          <form class="form-validate">
            <div class="row">
              <div class="col-md-4">
                <div class="mb-1">
                  <label class="form-label" for="username">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Username"
                    value="eleanor.aguilar"
                    name="username"
                    id="username"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-1">
                  <label class="form-label" for="name">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Name"
                    value="Eleanor Aguilar"
                    name="name"
                    id="name"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-1">
                  <label class="form-label" for="email">E-mail</label>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Email"
                    value="eleanor.aguilar@gmail.com"
                    name="email"
                    id="email"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-1">
                  <label class="form-label" for="status">Status</label>
                  <select class="form-select" id="status">
                    <option>Active</option>
                    <option>Blocked</option>
                    <option>Deactivated</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-1">
                  <label class="form-label" for="role">Role</label>
                  <select class="form-select" id="role">
                    <option>Admin</option>
                    <option>User</option>
                    <option>Staff</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-1">
                  <label class="form-label" for="company">Company</label>
                  <input
                    type="text"
                    class="form-control"
                    value="WinDon Technologies Pvt Ltd"
                    placeholder="Company name"
                    id="company"
                  />
                </div>
              </div>
              <div class="col-12">
                <div class="table-responsive border rounded mt-1">
                  <h6 class="py-1 mx-1 mb-0 font-medium-2">
                    <i data-feather="lock" class="font-medium-3 me-25"></i>
                    <span class="align-middle">Permission</span>
                  </h6>
                  <table class="table table-striped table-borderless">
                    <thead class="table-light">
                      <tr>
                        <th>Module</th>
                        <th>Read</th>
                        <th>Write</th>
                        <th>Create</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Admin</td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="admin-read" checked />
                            <label class="form-check-label" for="admin-read"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="admin-write" />
                            <label class="form-check-label" for="admin-write"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="admin-create" />
                            <label class="form-check-label" for="admin-create"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="admin-delete" />
                            <label class="form-check-label" for="admin-delete"></label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Staff</td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="staff-read" />
                            <label class="form-check-label" for="staff-read"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="staff-write" checked />
                            <label class="form-check-label" for="staff-write"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="staff-create" />
                            <label class="form-check-label" for="staff-create"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="staff-delete" />
                            <label class="form-check-label" for="staff-delete"></label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Author</td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="author-read" checked />
                            <label class="form-check-label" for="author-read"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="author-write" />
                            <label class="form-check-label" for="author-write"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="author-create" checked />
                            <label class="form-check-label" for="author-create"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="author-delete" />
                            <label class="form-check-label" for="author-delete"></label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Contributor</td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="contributor-read" />
                            <label class="form-check-label" for="contributor-read"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="contributor-write" />
                            <label class="form-check-label" for="contributor-write"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="contributor-create" />
                            <label class="form-check-label" for="contributor-create"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="contributor-delete" />
                            <label class="form-check-label" for="contributor-delete"></label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>User</td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="user-read" />
                            <label class="form-check-label" for="user-read"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="user-create" />
                            <label class="form-check-label" for="user-create"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="user-write" />
                            <label class="form-check-label" for="user-write"></label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="user-delete" checked />
                            <label class="form-check-label" for="user-delete"></label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1">Save Changes</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
        <!-- Account Tab ends -->

        <!-- Information Tab starts -->
        <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
          <!-- users edit Info form start -->
          <form class="form-validate">
            <div class="row mt-1">
              <div class="col-12">
                <h4 class="mb-1">
                  <i data-feather="user" class="font-medium-4 me-25"></i>
                  <span class="align-middle">Personal Information</span>
                </h4>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="birth">Birth date</label>
                  <input
                    id="birth"
                    type="text"
                    class="form-control birthdate-picker"
                    name="dob"
                    placeholder="YYYY-MM-DD"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="mobile">Mobile</label>
                  <input id="mobile" type="text" class="form-control" value="&#43;6595895857" name="phone" />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="website">Website</label>
                  <input
                    id="website"
                    type="text"
                    class="form-control"
                    placeholder="Website here..."
                    value="https://rowboat.com/insititious/Angelo"
                    name="website"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="languages">Languages</label>
                  <select id="languages" class="form-select">
                    <option value="English">English</option>
                    <option value="Spanish">Spanish</option>
                    <option value="French" selected>French</option>
                    <option value="Russian">Russian</option>
                    <option value="German">German</option>
                    <option value="Arabic">Arabic</option>
                    <option value="Sanskrit">Sanskrit</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="d-block form-label mb-1">Gender</label>
                  <div class="form-check form-check-inline">
                    <input type="radio" id="male" name="gender" class="form-check-input" />
                    <label class="form-check-label" for="male">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" id="female" name="gender" class="form-check-input" checked />
                    <label class="form-check-label" for="female">Female</label>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="d-block form-label mb-1">Contact Options</label>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="email-cb" checked />
                    <label class="form-check-label" for="email-cb">Email</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="message" checked />
                    <label class="form-check-label" for="message">Message</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="phone" />
                    <label class="form-check-label" for="phone">Phone</label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <h4 class="mb-1 mt-2">
                  <i data-feather="map-pin" class="font-medium-4 me-25"></i>
                  <span class="align-middle">Address</span>
                </h4>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="address-1">Address Line 1</label>
                  <input
                    id="address-1"
                    type="text"
                    class="form-control"
                    value="A-65, Belvedere Streets"
                    name="address"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="address-2">Address Line 2</label>
                  <input id="address-2" type="text" class="form-control" placeholder="T-78, Groove Street" />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="postcode">Postcode</label>
                  <input id="postcode" type="text" class="form-control" placeholder="597626" name="zip" />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="city">City</label>
                  <input id="city" type="text" class="form-control" value="New York" name="city" />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="state">State</label>
                  <input id="state" type="text" class="form-control" name="state" placeholder="Manhattan" />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="mb-1">
                  <label class="form-label" for="country">Country</label>
                  <input id="country" type="text" class="form-control" name="country" placeholder="United States" />
                </div>
              </div>
              <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1">Save Changes</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
            </div>
          </form>
          <!-- users edit Info form ends -->
        </div>
        <!-- Information Tab ends -->

        <!-- Social Tab starts -->
        <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
          <!-- users edit social form start -->
          <form class="form-validate">
            <div class="row">
              <div class="col-lg-4 col-md-6 mb-1">
                <label class="form-label" for="twitter-input">Twitter</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text" id="basic-addon3">
                    <i data-feather="twitter" class="font-medium-2"></i>
                  </span>
                  <input
                    id="twitter-input"
                    type="text"
                    class="form-control"
                    value="https://www.twitter.com/adoptionism744"
                    placeholder="https://www.twitter.com/"
                    aria-describedby="basic-addon3"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-1">
                <label class="form-label" for="facebook-input">Facebook</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text" id="basic-addon4">
                    <i data-feather="facebook" class="font-medium-2"></i>
                  </span>
                  <input
                    id="facebook-input"
                    type="text"
                    class="form-control"
                    value="https://www.facebook.com/adoptionism664"
                    placeholder="https://www.facebook.com/"
                    aria-describedby="basic-addon4"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-1">
                <label class="form-label" for="instagram-input">Instagram</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text" id="basic-addon5">
                    <i data-feather="instagram" class="font-medium-2"></i>
                  </span>
                  <input
                    id="instagram-input"
                    type="text"
                    class="form-control"
                    value="https://www.instagram.com/adopt-ionism744"
                    placeholder="https://www.instagram.com/"
                    aria-describedby="basic-addon5"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-1">
                <label class="form-label" for="github-input">Github</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text" id="basic-addon9">
                    <i data-feather="github" class="font-medium-2"></i>
                  </span>
                  <input
                    id="github-input"
                    type="text"
                    class="form-control"
                    value="https://www.github.com/madop818"
                    placeholder="https://www.github.com/"
                    aria-describedby="basic-addon9"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-1">
                <label class="form-label" for="codepen-input">Codepen</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text" id="basic-addon12">
                    <i data-feather="codepen" class="font-medium-2"></i>
                  </span>
                  <input
                    id="codepen-input"
                    type="text"
                    class="form-control"
                    value="https://www.codepen.com/adoptism243"
                    placeholder="https://www.codepen.com/"
                    aria-describedby="basic-addon12"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-1">
                <label class="form-label" for="slack-input">Slack</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text" id="basic-addon11">
                    <i data-feather="slack" class="font-medium-2"></i>
                  </span>
                  <input
                    id="slack-input"
                    type="text"
                    class="form-control"
                    value="@adoptionism744"
                    placeholder="https://www.slack.com/"
                    aria-describedby="basic-addon11"
                  />
                </div>
              </div>

              <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1">Save Changes</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
            </div>
          </form>
          <!-- users edit social form ends -->
        </div>
        <!-- Social Tab ends -->
      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js'))}}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js'))}}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js'))}}"></script>
  <script src="{{ asset(mix('js/scripts/components/components-navs.js'))}}"></script>
@endsection
