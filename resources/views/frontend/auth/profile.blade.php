@extends('frontend.layouts.app')

@section('title', 'profile')
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f6fa;
            color: #252525;
        }

        .profile-section {
            width: 100%;
            padding: 50px 20px;
        }

        .profile-container {
            max-width: 950px;
            margin: 0 auto;
        }

        .profile-heading {
            margin-bottom: 25px;
        }

        .profile-heading h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .profile-heading p {
            color: #777;
            font-size: 14px;
            line-height: 1.6;
        }

        .profile-card {
            background: #fff;
            border-radius: 14px;
            padding: 35px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.04);
            border: 1px solid #ededed;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .profile-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 9px;
            color: #333;
        }

        .form-group label span {
            color: #d64545;
        }

        .form-group input {
            width: 100%;
            height: 48px;
            padding: 0 14px;
            border: 1px solid #dedede;
            border-radius: 7px;
            outline: none;
            font-family: inherit;
            font-size: 14px;
            color: #333;
            background: #fff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input::placeholder {
            color: #aaa;
        }

        .form-group input:focus {
            border-color: #94734a;
            box-shadow: 0 0 0 3px rgba(148, 115, 74, 0.10);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #777;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
        }

        .form-note {
            font-size: 12px;
            color: #888;
            margin-top: 8px;
            line-height: 1.5;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }

        .update-btn {
            border: none;
            background: #94734a;
            color: #fff;
            padding: 15px 32px;
            border-radius: 7px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .update-btn:hover {
            background: #755834;
        }

        @media (max-width: 600px) {
            .profile-section {
                padding: 25px 14px;
            }

            .profile-heading {
                margin-bottom: 20px;
            }

            .profile-heading h2 {
                font-size: 23px;
            }

            .profile-heading p {
                font-size: 13px;
            }

            .profile-card {
                padding: 22px 16px;
                border-radius: 10px;
            }

            .section-title {
                font-size: 16px;
                margin-bottom: 20px;
            }

            .profile-form {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .form-group.full-width {
                grid-column: auto;
            }

            .form-group input {
                height: 46px;
                font-size: 14px;
            }

            .form-actions {
                margin-top: 24px;
                padding-top: 20px;
            }

            .update-btn {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
    <section class="profile-section">
        <div class="profile-container">

            <div class="profile-heading">
                <h2>My Profile</h2>
                <p>Manage your personal and business information.</p>
            </div>

            <div class="profile-card">

                <h3 class="section-title">Personal & Business Details</h3>

                <form action="#" method="POST" id="profileForm">

                    <div class="profile-form">

                        <div class="form-group">
                            <label for="first_name">
                                First Name <span>*</span>
                            </label>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter first name" autocomplete="given-name" value='{{$profile->first_name}}' required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">
                                Last Name <span>*</span>
                            </label>
                            <input type="text" id="last_name"
                                   name="last_name"
                                   placeholder="Enter last name"
                                   autocomplete="family-name" value='{{$profile->last_name}}' required>
                        </div>

                        <div class="form-group">
                            <label for="business_name">Business Name</label>
                            <input type="text" id="business_name"
                                   name="business_name"
                                   placeholder="Enter business name"
                                   autocomplete="organization" value='{{$profile->business_name}}'>
                        </div>

                        <div class="form-group">
                            <label for="gst_no">GST Number</label>
                            <input type="text" id="gst_no"
                                   name="gst_no"
                                   placeholder="Enter GST number"
                                   maxlength="15"
                                   style="text-transform: uppercase;" value='{{$profile->gst_no}}'>
                        </div>

                        <div class="form-group">
                            <label for="mobile">
                                Phone Number <span>*</span>
                            </label>
                            <input type="tel" id="mobile"
                                   name="mobile"
                                   placeholder="Enter mobile number"
                                   autocomplete="tel"
                                   maxlength="10"
                                   inputmode="numeric"
                                   pattern="[0-9]{10}" value='{{$profile->mobile}}' required>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                Email Address <span>*</span>
                            </label>
                            <input type="email" id="email"
                                   name="email"
                                   placeholder="Enter email address"
                                   autocomplete="email" value='{{$profile->email}}' required>
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <div class="password-wrapper">
                                <input type="password" id="password"
                                       name="password"
                                       placeholder="Enter new password"
                                       autocomplete="new-password"
                                       minlength="8">
                                <button type="button"
                                        class="toggle-password"
                                        data-target="password">Show</button>
                            </div>
                            <p class="form-note">
                                Leave blank if you do not want to change your password.
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <div class="password-wrapper">
                                <input type="password" id="confirm_password"
                                       name="confirm_password"
                                       placeholder="Confirm new password"
                                       autocomplete="new-password">
                                <button type="button"
                                        class="toggle-password"
                                        data-target="confirm_password">Show</button>
                            </div>
                        </div>

                    </div>

                    <div class="form-actions">
                        <button type="submit" class="update-btn">
                            Update Profile
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function () {
                const input = document.getElementById(this.dataset.target);
                const isPassword = input.type === 'password';

                input.type = isPassword ? 'text' : 'password';
                this.textContent = isPassword ? 'Hide' : 'Show';
            });
        });

        document.getElementById('profileForm').addEventListener('submit', function (e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password and Confirm Password do not match.');
                return;
            }

            if (!password && confirmPassword) {
                e.preventDefault();
                alert('Please enter a new password first.');
            }
        });
    </script>
@endsection