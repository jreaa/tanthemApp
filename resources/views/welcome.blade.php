
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>CRM | OPTIMA</title>
		<meta name="user" content="{{ Auth::user() }}">
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{asset('assets')}}/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{asset('assets')}}/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->

		<link href="toastr.css" rel="stylesheet"/>

		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('assets')}}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets')}}/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets')}}/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<link href="{{asset('assets')}}/css/pages/wizard/wizard-3.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />

		<!--/Jquey/-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<script src="../js/Utils/utils.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
		<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body"  class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">

        <!--Mobile-->
        <div id="kt_header_mobile" class="header-mobile">
			<!--begin::Logo-->
			<a href="/">
				<img alt="Logo" src="{{asset('img')}}/logo1.png" class="logo-default max-h-30px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
			</div>
		</div>
        
        <div id="app">
            <app></app>
        </div>

        	<!-- begin::User Panel-->
		<div id="kt_quick_user" class="offcanvas offcanvas-left p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">Mi perfil
				</h3>
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content pr-5 mr-n5">
				<!--begin::Header-->
				<div class="d-flex align-items-center mt-5">
					<div class="symbol symbol-80 mr-5">
						<div class="symbol-label">
						<span class="symbol symbol-lg symbol-25 symbol-light-primary">
								<span class="symbol-label font-size-h3 font-weight-bold" style="text-transform: capitalize;"
								>{{ auth()->user()->name[0] }}</span
								>
							</span></div>
						<i class="symbol-badge bg-primary"></i>
					</div>
					<div class="d-flex flex-column" style="margin-left: 10px;">
						<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ ucwords(auth()->user()->name) }}</a>
						<div class="text-muted mt-1">Admin</div>
						<div class="navi mt-2">
							<a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">{{ ucwords(auth()->user()->email)  }}</span>
								</span>
							</a>
							<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-danger font-weight-bolder py-2 px-5">Cerrar Sesion</a>
						</div>
					</div>
				</div>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>

				<!--end::Header-->
				<!--begin::Separator-->
				<div class="separator separator-dashed mt-8 mb-5"></div>
				<!--end::Separator-->
				<!--begin::Nav-->

				<div id="kt_scrolltop" class="scrolltop" bis_skin_checked="1">
					<span class="svg-icon">
						<!--begin::Svg Icon | path:/metronic/theme/html/demo3/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"></polygon>
								<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"></rect>
								<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"></path>
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</div>

				<!--
				<div class="navi navi-spacer-x-0 p-0">
					
					<a href="custom/apps/user/profile-1/personal-information.html" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
									
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
											</g>
										</svg>
									
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">My Profile</div>
								<div class="text-muted">Account settings and more
								<span class="label label-light-danger label-inline font-weight-bold">update</span></div>
							</div>
						</div>
					</a>
					
				</div>
				-->
			</div>
			<!--end::Content-->
		</div>
		<!-- end::User Panel-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="path/to/vue.js"></script>
		<script src="path/to/vue-simple-spinner.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    		<!--end::Demo Panel-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#1BC5BD", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#1BC5BD", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('assets')}}/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('assets')}}/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="{{asset('assets')}}/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('assets')}}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="{{asset('assets')}}/js/pages/custom/wizard/wizard-3.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets')}}/js/pages/widgets.js"></script>
		<!--end::Page Scripts-->

		<!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('assets')}}/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors-->
		<script src="toastr.js"></script>
		
	</body>
	<!--end::Body-->
</html>