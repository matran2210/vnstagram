<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Các tham số cấu hình cho ứng dụng 
    |--------------------------------------------------------------------------
    |
    */

    'name' => env('APP_NAME', 'Laravel'), 
    'app_debug' => env('APP_DEBUG', 'Laravel'),
    "file_server" => array(
        "url"             => "http://10.20.5.30:90/fileserver/",
        "owner_code"      => "01",
        "app_code"        => "IVAN",
        "authen"          => "efyapa:1t3hefyvn",
    ),
    "template_dir" => storage_path('templates'),
    'export_dir'   => storage_path('export'),
    "mail" => [
        "template_mail_dir" => storage_path('templates/mail'),
        "template_mail_econtract" => storage_path('templates/mail_econtract'),
        "template_mail_remote" => storage_path('templates/mail_remote'),
        "template_mail_efy_id" => storage_path('templates/mail_efy_id'),
        "template_mail_remote" => storage_path('templates/mail_remote'),
        "link_reset_password" => 'http://servertest.econtractapp.efy.com.vn/reset-password',
        "link_lookup" => 'http://servertest.econtractapp.efy.com.vn/document-received',
        "link_lookup_login" => 'http://servertest.econtractapp.efy.com.vn/worker-login', // Link đăng nhập của NLĐ trong TH tài khoản đăng nhập là duy nhất
        "link_lookup_login_by_tax_code" => 'http://servertest.econtractapp.efy.com.vn/staff-document-received-by-code', // Link đăng nhập của NLĐ theo từng đơn vị (Tài khoản đăng nhập có thể trùng lặp giữa các đơn vị)
        "link_lookup_commercial" => 'http://servertest.econtractapp.efy.com.vn/contract-receiver',
        "link_reset_staff_password" => 'http://servertest.econtractapp.efy.com.vn/worker-reset-password',
        "link_register_efy_id" => 'https://efy.com.vn/efy-id/register/',
        "link_reset_password_efy_id" => 'https://servertest.efy.com.vn/efy-id/reset-password',
        "link_user_login" => 'http://118.70.81.203:8530//login',
        "link_lookup_document" => 'http://118.70.81.203:8530//receive-electronic-document',
    ],
    //id passport
    "PASSWORD_CLIENT_ID" => env('PASSWORD_CLIENT_ID', ''),
    "PASSWORD_CLIENT_SECRET" => env('PASSWORD_CLIENT_SECRET', ''),
    "captcha" => [
        // uatecontractapp.efy.com.vn
        // "site_key"         => "6LculGkbAAAAANuGr5jTtXEtqnxa9awRLvvqbJuT",
        // "secret_key"           => "6LculGkbAAAAADdLhHEt6se_ScQChSycsMMDMEbz",
        // servertest.econtractapp.efy.com.vn
        // "site_key"         => "6Lfe3WIbAAAAAK40mEZZ1596CEWp2zHvv1oanKsh",
        // "secret_key"           => "6Lfe3WIbAAAAANFPrDlMJOzZ3quPumU3_k7_UicL",
        "site_key"         => "6Lfe3WIbAAAAAK40mEZZ1596CEWp2zHvv1oanKsh",
        "secret_key"           => "6Lfe3WIbAAAAANFPrDlMJOzZ3quPumU3_k7_UicL",
        // develop.econtractapp.efy.com.vn
        // "site_key"         => "6LdJ3mIbAAAAALxnQ_o-gnAR4VqsdH-RZejkr-z_",
        // "secret_key"           => "6LdJ3mIbAAAAAKs6S29DXFLp5QOF1dH7-aMOJBXF",
        // local host
//        "site_key"         => "6LcIs0caAAAAAO0CkEBkuWplF22OxwcVShqpyOjE",
//        "secret_key"           => "6LcIs0caAAAAADB_7C0EN0ZzYtDbnIOvqBsSZHJ7",
        // servertest
        // "site_key"         => "6LcOs0caAAAAAFo3qo5qUHOSIqb-khA4CMxEOSTC",
        // "secret_key"           => "6LcOs0caAAAAAMQ2q9nh4YsrZgh1UQ82To3VyCNu",
        // online
        // "site_key"         => "6LdqRaIaAAAAAIEqqreA1wIBsrD8v2NSsGPZCO-r",
        // "secret_key"           => "6LdqRaIaAAAAABLuGuv6x54jIQeIWZw3BkkTmmX9",
        // online new domain
        // "site_key"         => "6Lc1e-kaAAAAAFMgH8viJpQclc7J4NbGbcQyHVZY",
        // "secret_key"           => "6Lc1e-kaAAAAAGzAFZCEDmvIldGFhHmlBBWrErDJ",
        "show_captcha" => 5,//nếu tổng số lần đăng nhập lỗi liên tiếp của tất cả user lớn hơn hoặc bằng giá trị này sẽ phải nhập captcha
        "lock_user" => 10,//nếu số lần đăng nhập lỗi liên tiếp của 1 user lớn hơn hoặc bằng giá trị này, user đó sẽ bị khóa
        "show_captcha_lookup" => 10, // tra cứu sai thông tin quá thì sẽ hiển thị captcha
        "show_captcha_staff_sign" => 10 // nld nhập thông tin ký số quá thì sẽ hiển thị captcha,
    ],
    'elog' => array(
        "url"           => "https://elog.efy.com.vn",
        "app_code"      => "ECONTRACT",
        "Authentication" => array(
            "user" => "efyvn",
            "password" => "efyvn@123",
        ),
    ),
    "basic_auth" => [
        [
            "name"             => "EFY",
            "tax_code"         => "0314282997",
            "username"         => "econtract",
            "password"         => "econtract;!A@",
            "username_account" => "0314282997",// tên đăng nhập của user mặc định
        ],
        [
            "name"             => "EFY",
            "tax_code"         => "9999999950",
            "username"         => "efyvn",
            "password"         => "efyvn@123",
            "username_account" => "9999999950",// tên đăng nhập của user mặc định
        ],
        // Tích hợp Ally build test
        [
            "name"             => "EFY",
            "tax_code"         => "9999999321",
            "username"         => "9999999321",
            "password"         => "efyvn@123",
            "username_account" => "9999999321",// tên đăng nhập của user mặc định
            "pass_code"        => "efyvn@123",// Mã pin cks tổ chức
            "send_sms_to_driver" => true
        ],
        [
            "name"             => "EFY",
            "tax_code"         => "9999999551",
            "username"         => "9999999551",
            "password"         => "efyvn@123",
            "username_account" => "9999999551",// tên đăng nhập của user mặc định
        ],
        [
            "name"             => "CÔNG TY TNHH NFQ VIỆT NAM",
            "tax_code"         => "0314588343",
            "username"         => "0314588343",
            "password"         => "aBn2sUa1ZS9KjY_j",
            "username_account" => "0314588343",// tên đăng nhập của user mặc định
        ],
        [
            "name"               => "HN Company", // Tài khoản test tích hợp HĐTM
            "tax_code"           => "9999996789",
            "username"           => "9999996789",
            "password"           => "efyvn@123",
            "username_account"   => "9999996789",
            "otp_type"           => "email", // kiểu gửi otp cho khách hàng: email - sms
            "uuid"               => "1c01b3ab-e7ae-4433-bf98-7cc5d182deb4",// Mã pin cks tổ chức
            "pass_code"          => "04111995",// Mã pin cks tổ chức
            "send_sms_to_driver" => true,
            "provide_cert_customer" => true, // nếu cấp cts, thì cần thêm thông tin để cấp
            "is_update_contract" => false, // cập nhật lại hợp đồng bên erp theo api yêu cầu
            "delete_and_create" => true, // xóa, tạo lại hđ nếu other id hđ trùng
            'api' => array(
                "url"           => "http://118.70.81.203:8001/api/",
                'url_update_commercial_contract' => 'invoices/update-report-link',
                "header"        => array(
                    "Accept"       => "application/json; charset=UTF-8",
                    "Content-Type" => "application/json; charset=UTF-8",
                ),
                "Authentication" => array(
                    "Authorization" => "Basic a2VraGFpOmtla2hhaUAxMjNxYXp3c3hlZGNAIQ==",
                ),
            ),
        ],
        [
            "name"               => "HAO Company", // Tài khoản test tích hợp HĐTM
            "tax_code"           => "9999999550",
            "username"           => "9999999550",
            "password"           => "efyvn@123",
            "username_account"   => "9999999550",
            "otp_type"           => "email", // kiểu gửi otp cho khách hàng: email - sms
            "uuid"               => "97152b06-e304-47d2-a35e-a8c53816b000",// Mã pin cks tổ chức
            "pass_code"          => "12345678 ",// Mã pin cks tổ chức
            "send_sms_to_driver" => true,
            "provide_cert_customer" => false, // nếu cấp cts, thì cần thêm thông tin để cấp
            "is_update_contract" => true, // cập nhật lại hợp đồng bên erp theo api yêu cầu
            "delete_and_create" => true, // xóa, tạo lại hđ nếu other id hđ trùng
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://118.70.81.203:8001/api/invoices/update-report-link",  // link api
                "username" => "", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "Test Ihoadon", // Tài khoản test tích hợp HĐTM
            "tax_code"           => "9999999666",
            "username"           => "9999999666",
            "password"           => "efyvn@123",
            "username_account"   => "9999999666",
            "otp_type"           => "email", // kiểu gửi otp cho khách hàng: email - sms
            "uuid"               => "97152b06-e304-47d2-a35e-a8c53816b000",// Mã pin cks tổ chức
            "pass_code"          => "12345678 ",// Mã pin cks tổ chức
            "send_sms_to_driver" => true,
            "provide_cert_customer" => false, // nếu cấp cts, thì cần thêm thông tin để cấp
            "is_update_contract" => true, // cập nhật lại hợp đồng bên erp theo api yêu cầu
            "delete_and_create" => true, // xóa, tạo lại hđ nếu other id hđ trùng
            'api' => array(
                "url"           => "http://118.70.81.203:8001/api/",
                'url_update_commercial_contract' => 'invoices/update-report-link',
                "header"        => array(
                    "Accept"       => "application/json; charset=UTF-8",
                    "Content-Type" => "application/json; charset=UTF-8",
                ),
                "Authentication" => array(
                    "Authorization" => "Basic a2VraGFpOmtla2hhaUAxMjNxYXp3c3hlZGNAIQ==",
                ),
            ),
        ],
        [
            "name"               => "AllyBuild test", // Tài khoản test tích hợp HĐTM
            "tax_code"           => "9999990001",
            "username"           => "9999990001",
            "password"           => "efyvn@123",
            "username_account"   => "9999990001",
            "otp_type"           => "email", // kiểu gửi otp cho khách hàng: email - sms
            "uuid"               => "32E08B93-C973-47FB-9F3F-A1DECD86FAE5",// Mã pin cks tổ chức
            "pass_code"          => "75500152",// Mã pin cks tổ chức
            "send_sms_to_driver" => true,
            "is_update_contract" => false, // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "sign_now"           => true, // tạo hđ và bên lập ký luôn
            "delete_and_create"  => true, // xóa, tạo lại hđ nếu other id hđ trùng
            'api' => array(
                "authen_type" => "bearer", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "https://45.119.83.239:8822/api/TokenAuth/GetToken", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "https://45.119.83.239:8822/api/services/app/DmsConnect/SignedBill",  // link api
                "username" => "efyapi", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "efyapi", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "Fccom test", // Tài khoản test Fccom tích hợp HĐTM
            "tax_code"           => "9999990002",
            "username"           => "9999990002",
            "password"           => "efyvn@123",
            "username_account"   => "9999990002",
            "provide_cert_customer" => true, // nếu cấp cks cho khách hàng
            //"is_update_contract" => "BEN_NHAN", // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "pre_signed"         => "BEN_NHAN", // ký trc: BEN_LAP/BEN_NHAN, k truyền thì mặc định bên lập ký trc
            "is_attach_file"     => true, // true: nếu có file đính kèm
            "sign_attach_file"   => "BEN_NHAN", // ký file đính kèm: BEN_LAP/BEN_NHAN/ALL
            // "sign_customer_info_file" => true, // ký file xác nhận thông tin khách hàng khi KH ký
            "return_detail_status" => true, // return trạng thái hđ chi tiết theo bên ký
            "brandname_sms" => true, // gửi sms theo brandname
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://1.53.40.35:5001/api/EContracts/FCC_UpdateContractStatus",  // link api
                "url_send_sms" => "http://1.53.40.35:5001/api/SmsMessage/FCC_SendSMSMessage",  // link api sms
                "username" => "FCC_ApiPartner", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "Fcc@fccom.vn", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "Fccom test UAT", // Tài khoản test Fccom tích hợp HĐTM
            "tax_code"           => "9999900013",
            "username"           => "9999900013",
            "password"           => "efyvn@123",
            "username_account"   => "9999900013",
            "provide_cert_customer" => true, // nếu cấp cks cho khách hàng
            "is_update_contract" => true, // cập nhật lại hợp đồng bên erp theo api yêu cầu
            "pre_signed"         => "BEN_NHAN", // ký trc: BEN_LAP/BEN_NHAN, k truyền thì mặc định bên lập ký trc
            "is_attach_file"     => true, // true: nếu có file đính kèm
            "sign_attach_file"   => "BEN_NHAN", // ký file đính kèm: BEN_LAP/BEN_NHAN/ALL
            // "sign_customer_info_file" => true, // ký file xác nhận thông tin khách hàng khi KH ký
            "return_detail_status" => true, // return trạng thái hđ chi tiết theo bên ký
            "brandname_sms" => true, // gửi sms theo brandname
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://1.53.40.35:5001/api/EContracts/FCC_UpdateContractStatus",  // link api
                "url_send_sms" => "http://1.53.40.35:5001/api/SmsMessage/FCC_SendSMSMessage",  // link api sms
                "url_send_sms" => "http://1.53.40.35:5001/api/SmsMessage/FCC_SendSMSMessage",  // link api
                "username" => "FCC_ApiPartner", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "Fcc@fccom.vn", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "test", // test cho Faccon
            "tax_code"           => "9999966789",
            "username"           => "9999966789",
            "password"           => "efyvn@123",
            "username_account"   => "9999966789",
            "provide_cert_customer" => true, // nếu cấp cks cho khách hàng
            "is_update_contract" => false, // cập nhật lại hợp đồng bên erp theo api yêu cầu
            "pre_signed"         => "BEN_NHAN", // ký trc: BEN_LAP/BEN_NHAN, k truyền thì mặc định bên lập ký trc
            "is_attach_file"     => true, // true: nếu có file đính kèm
            "sign_attach_file"   => "BEN_NHAN", // ký file đính kèm: BEN_LAP/BEN_NHAN/CA_HAI
            "sign_customer_info_file" => true, // ký file xác nhận thông tin khách hàng khi KH ký
            "return_other"       => true, // dùng khi gọi api update cho erp, kiểu dữ liệu trả về khác: chỉ dùng tích hợp iHOADON, Vumedia
            "return_detail_status" => true, // return trạng thái hđ chi tiết theo bên ký ký
            "brandname_sms" => true, // return trạng thái hđ chi tiết theo bên ký ký
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://1.53.40.35:5001/api/EContracts/FCC_UpdateContractStatus",  // link api
                "url_send_sms" => "http://1.53.40.35:5001/api/SmsMessage/FCC_SendSMSMessage",  // link api
                "username" => "FCC_ApiPartner", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "Fcc@fccom.vn", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "Vestas", // Tài khoản vestas ihoadon 
            "tax_code"           => "0107605456",
            "username"           => "0107605456",
            "password"           => "dHRa-^4E8Qa8_*q2",
            "username_account"   => "0107605456",
            "uuid"               => "d935c195-f3a0-41fc-83d5-b8e9b5e40d31",// Mã pin cks tổ chức
            "pass_code"          => "712553 ",// Mã pin cks tổ chức
            "is_update_contract" => "BEN_NHAN", // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "delete_and_create"  => true, // xóa, tạo lại hđ nếu other id hđ trùng
            "sign_now"           => true, // tạo hđ và bên lập ký luôn
            "return_other"       => true, // dùng khi gọi api update cho erp, kiểu dữ liệu trả về khác: chỉ dùng tích hợp iHOADON, Vumedia
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "https://ihoadon.com.vn/api/invoices/update-report-link",  // link api
                "username" => "kekhai", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "kekhai@123qazwsxedc@!", // mật khẩu nếu có sử dụng xác thực api
                "add_taxcode" => true, // thêm taxcode vào header
            ),
        ],
        [
            "name"               => "Test Ihoadon Onl", // Tài khoản test tích hợp HĐTM
            "tax_code"           => "8888888803",
            "username"           => "8888888803",
            "password"           => "efyvn@123",
            "username_account"   => "8888888803",
            "uuid"               => "d935c195-f3a0-41fc-83d5-b8e9b5e40d31",// Mã pin cks tổ chức
            "pass_code"          => "712553 ",// Mã pin cks tổ chức
            "is_update_contract" => "BEN_NHAN", // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "delete_and_create"  => true, // xóa, tạo lại hđ nếu other id hđ trùng
            "sign_now"           => true, // tạo hđ và bên lập ký luôn
            "return_other"       => true, // dùng khi gọi api update cho erp, kiểu dữ liệu trả về khác: chỉ dùng tích hợp iHOADON, Vumedia
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "https://ihoadon.com.vn/api/invoices/update-report-link",  // link api
                "username" => "kekhai", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "kekhai@123qazwsxedc@!", // mật khẩu nếu có sử dụng xác thực api
                "add_taxcode" => true, // thêm taxcode vào header
            ),
        ],
        [
            "name"               => "Test Vumedia", // Tài khoản test tích hợp HĐTM
            "tax_code"           => "9999990004",
            "username"           => "9999990004",
            "password"           => "efyvn@123",
            "username_account"   => "9999990004",
            "is_update_contract" => true, // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "sign_now"           => true, // tạo hđ và bên lập ký luôn
            "return_other"       => false, // dùng khi gọi api update cho erp, kiểu dữ liệu trả về khác: dùng tích hợp iHOADON, Vumedia
            'api' => array(
                "authen_type" => "", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "https://app.citywork.vn/gCityworkServices/rest/gcrm/gsv_data/CN0027/nghiepvu/vanbandientu/capnhattrangthai?tokent=c934936a4757151a4464f21354e974aa",  // link api
                "username" => "", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "Vumedia", // Tài khoản tích hợp HĐTM
            "tax_code"           => "0109511789",
            "username"           => "0109511789",
            "password"           => "XZsAD2aAThws324R",
            "username_account"   => "0109511789",
            "is_update_contract" => "BEN_NHAN", // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "sign_now"           => true, // tạo hđ và bên lập ký luôn
            "return_other"       => true, // dùng khi gọi api update cho erp, kiểu dữ liệu trả về khác: dùng tích hợp iHOADON, Vumedia
            'api' => array(
                "authen_type" => "", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://quanly.levu.com.vn/api/contract/updateStatus",  // link api
                "username" => "", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"             => "Erp", // Tài khoản test tích hợp HĐTM Erp
            "tax_code"         => "0000000210",
            "username"         => "0000000210",
            "password"         => "efyvn@123",
            "username_account" => "thanhhoa.efy@gmail.com",
            "otp_type"         => "email", // kiểu gửi otp cho khách hàng: email - sms
            "step"             => "CREATE",
            "integrate_erp"    => true,
            "is_send_specific" => true,
        ],
        [
            "name"             => "Test HDLD", // tk test tích hợp hdld chung (servertest)
            "tax_code"         => "9999990005",
            "username"         => "9999990005",
            "password"         => "efyvn@123",
            "username_account" => "9999990005", // tên đăng nhập của user mặc định
            "create_contract_include_staff" => true, // tạo hđ, kèm theo nlđ,
            "is_update_contract" => false, // cập nhật lại hợp đồng bên erp theo api yêu cầu
            'api' => array(
                "url"           => "",
                'url_update_commercial_contract' => '',
                "header"        => array(
                    "Accept"       => "application/json; charset=UTF-8",
                    "Content-Type" => "application/json; charset=UTF-8",
                ),
                "Authentication" => array(
                    "Authorization" => "Basic a2VraGFpOmtla2hhaUAxMjNxYXp3c3hlZGNAIQ==",
                ),
            ),
        ],
        [
            "name"             => "Test HDLD", // tk test tích hợp hdld chung (servertest)
            "tax_code"         => "9999990008",
            "username"         => "9999990008",
            "password"         => "efyvn@123",
            "username_account" => "9999990008", // tên đăng nhập của user mặc định
            "create_contract_include_staff" => true, // tạo hđ, kèm theo nlđ,
            "is_update_contract" => false, // cập nhật lại hợp đồng bên erp theo api yêu cầu
            'api' => array(
                "url"           => "",
                'url_update_commercial_contract' => '',
                "header"        => array(
                    "Accept"       => "application/json; charset=UTF-8",
                    "Content-Type" => "application/json; charset=UTF-8",
                ),
                "Authentication" => array(
                    "Authorization" => "Basic a2VraGFpOmtla2hhaUAxMjNxYXp3c3hlZGNAIQ==",
                ),
            ),
        ],
        [
            "name"             => "Test HDLD CityNow", // tk test tích hợp hdld citynow
            "tax_code"         => "9999990006",
            "username"         => "9999990006",
            "password"         => "efyvn@123",
            "username_account" => "9999990006", // tên đăng nhập của user mặc định
            "create_contract_include_staff" => true, // tạo hđ, kèm theo nlđ,
            "is_update_contract" => true, // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            'api' => array(
                "authen_type" => "api_key", // Hình thức xác thực API: rỗng, basic, bearer, api_key
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "https://citynow-sa.hrsol.citynow.jp/sc-api/efy/update-status",  // link api
                "username" => "", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "", // mật khẩu nếu có sử dụng xác thực api
                "api_key" => [
                    "key" => "x-api-token", // nếu authen_type = api_key
                    "value" => "7d10a77b3f6b4a86348f34a68fe89cfe",
                ],
            ),
        ],
        [
            "name"               => "Fast Work test", // server test
            "tax_code"           => "9999990007",
            "username"           => "9999990007",
            "password"           => "efyvn@123",
            "username_account"   => "9999990007",
            "provide_cert_customer" => false, // nếu cấp cks cho khách hàng
            "is_update_contract" => false, // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "pre_signed"         => "BEN_LAP", // ký trc: BEN_LAP/BEN_NHAN, k truyền thì mặc định bên lập ký trc
            // "identify_user_by_email" => true, // xác định user bằng email
            "return_detail_status" => true, // return trạng thái hđ chi tiết theo bên ký ký 
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "",  // link api
                "username" => "", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "", // mật khẩu nếu có sử dụng xác thực api
            )
        ],
        [
            "name"               => "TEST HDTM WF01", // Tài khoản TEST HDTM WF01
            "tax_code"           => "9999990010",
            "username"           => "9999990010",
            "password"           => "efyvn@123",
            "username_account"   => "9999990010",
            "provide_cert_customer" => true, // nếu cấp cks cho khách hàng
            "is_update_contract" => false, // cập nhật lại hợp đồng bên erp theo api yêu cầu
            "pre_signed"         => "BEN_NHAN", // ký trc: BEN_LAP/BEN_NHAN, k truyền thì mặc định bên lập ký trc
            "is_attach_file"     => true, // true: nếu có file đính kèm
            "sign_attach_file"   => "BEN_NHAN", // ký file đính kèm: BEN_LAP/BEN_NHAN/ALL
            // "sign_customer_info_file" => true, // ký file xác nhận thông tin khách hàng khi KH ký
            "return_detail_status" => true, // return trạng thái hđ chi tiết theo bên ký
            "brandname_sms" => false, // gửi sms theo brandname
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://1.53.40.35:5001/api/EContracts/FCC_UpdateContractStatus",  // link api
                "url_send_sms" => "http://1.53.40.35:5001/api/SmsMessage/FCC_SendSMSMessage",  // link api sms
                "username" => "FCC_ApiPartner", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "Fcc@fccom.vn", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"             => "Test HDLD LEANTEK", // tk test tích hợp hdld của đv leantek
            "tax_code"         => "9999990011",
            "username"         => "9999990011",
            "password"         => "efyvn@123",
            "username_account" => "9999990011", // tên đăng nhập của user mặc định
            "create_contract_include_staff" => true, // tạo hđ, kèm theo nlđ,
            "is_update_contract" => true, // cập nhật lại hợp đồng bên erp theo api yêu cầu,
            "return_detail_status" => true, // return trạng thái hđ chi tiết theo bên ký
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer, api_key
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://210.245.117.57:8080/ords/cmsdev/econtract/updateContract/",  // link api
                "username" => "testefy", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "testefy@123##", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"             => "Erp", // Tài khoản test tích hợp HĐTM Erp
            "tax_code"         => "0102519041",
            "username"         => "0102519041",
            "password"         => "ecgjSe4n8QupdkKN",
            "username_account" => "0102519041",
            "otp_type"         => "email", // kiểu gửi otp cho khách hàng: email - sms
            "step"             => "CREATE",
            "integrate_erp"    => true,
            "is_send_specific" => true,
        ],
        [
            "name"               => "AllyBuild", // Tài khoản Ally Build
            "tax_code"           => "0315688534",
            "username"           => "0315688534",
            "password"           => "QqdMvLybMN898UJy",
            "username_account"   => "0315688534",
            "otp_type"           => "email", // kiểu gửi otp cho khách hàng: email - sms
            "uuid"               => "abe978de-6a8f-400d-b1a2-0ebffe6fa713",// Mã pin cks tổ chức
            "pass_code"          => "923981",// Mã pin cks tổ chức
            "send_sms_to_driver" => true,
            "is_update_contract" => "BEN_NHAN", // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "sign_now"           => true, // tạo hđ và bên lập ký luôn
            "delete_and_create"  => true, // xóa, tạo lại hđ nếu other id hđ trùng
            'api' => array(
                "authen_type" => "bearer", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "https://www.allybuild.vn/api/TokenAuth/GetToken", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "https://www.allybuild.vn/api/services/app/DmsConnect/SignedBill",  // link api
                "username" => "efyapi", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "efyapi", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "Test AllyBuild onl", // Tài khoản Ally Build
            "tax_code"           => "9999900114",
            "username"           => "9999900114",
            "password"           => "efyvn@123",
            "username_account"   => "9999900114",
            "otp_type"           => "email", // kiểu gửi otp cho khách hàng: email - sms
            "uuid"               => "32E08B93-C973-47FB-9F3F-A1DECD86FAE5",// Mã pin cks tổ chức
            "pass_code"          => "75500152",// Mã pin cks tổ chức
            "send_sms_to_driver" => true,
            "is_update_contract" => false, // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "sign_now"           => true, // tạo hđ và bên lập ký luôn
            "delete_and_create"  => true, // xóa, tạo lại hđ nếu other id hđ trùng
            'api' => array(
                "authen_type" => "bearer", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "https://allydms.cepsoft.vn/api/TokenAuth/GetToken", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "https://allydms.cepsoft.vn/api/services/app/DmsConnect/SignedBill",  // link api
                "username" => "apiuser", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "123456", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "Test Vumedia Onl", // Test Vumedia Onl
            "tax_code"           => "9999905019",
            "username"           => "9999905019",
            "password"           => "efyvn@123",
            "username_account"   => "9999905019",
            "is_update_contract" => "BEN_NHAN", // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "sign_now"           => true, // tạo hđ và bên lập ký luôn
            "return_other"       => true, // dùng khi gọi api update cho erp, kiểu dữ liệu trả về khác: dùng tích hợp iHOADON, Vumedia
            'api' => array(
                "authen_type" => "", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://quanly.levu.com.vn/api/contract/updateStatus",  // link api
                "username" => "", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
        [
            "name"               => "Fccom Onl", // Tài khoản Fccom tích hợp HĐTM
            "tax_code"           => "0301516782",
            "username"           => "0301516782",
            "password"           => "6cUpS8QYHJ7svaWB",
            "username_account"   => "0301516782",
            "provide_cert_customer" => true, // nếu cấp cks cho khách hàng
            "is_update_contract" => "BEN_NHAN", // cập nhật lại hợp đồng bên erp theo api yêu cầu: BEN_NHAN, CA_HAI
            "pre_signed"         => "BEN_NHAN", // ký trc: BEN_LAP/BEN_NHAN, k truyền thì mặc định bên lập ký trc
            "is_attach_file"     => true, // true: nếu có file đính kèm
            "sign_attach_file"   => "BEN_NHAN", // ký file đính kèm: BEN_LAP/BEN_NHAN/ALL
            // "sign_customer_info_file" => true, // ký file xác nhận thông tin khách hàng khi KH ký
            "return_detail_status" => true, // return trạng thái hđ chi tiết theo bên ký
            "brandname_sms" => true, // gửi sms theo brandname
            'api' => array(
                "authen_type" => "basic", // Hình thức xác thực API: rỗng, basic, bearer
                "url_login" => "", // link đăng nhập để lấy token nếu hình thức xác thực là bearer
                "url" => "http://1.53.40.33:5001/api/EContracts/FCC_UpdateContractStatus",  // link api
                "url_send_sms" => "http://1.53.40.33:5001/api/SmsMessage/FCC_SendSMSMessage",  // link api sms
                "username" => "FCC_ApiPartner", // tên đăng nhập nếu có sử dụng xác thực api
                "password" => "Fcc@fccom.vn", // mật khẩu nếu có sử dụng xác thực api
            ),
        ],
    ],
    "api_export" => [
        'url' => 'http://10.20.5.30:9988/api/ebhxh/',
        'auth'=> [
            'name'      => 'EFY',
            'username'  => 'apiebhxhtool',
            'password'  => 'efyvn@eBhXhToOl'
        ],
        'header'=>[
            'Content-Type' => 'application/json; charset=UTF-8',
            'Accept'       => 'application/json; charset=UTF-8',
        ]
    ],
    "api_efy_id" => [
        "url"           => "http://118.70.81.203:8510/",
        "header" => [
            "Content-Type"  => "application/json"
        ],
        "Authentication" => [
            "Authorization" => "Basic ZWZ5dm46ZWZ5dm5AMTIz"
        ]
    ],
    "api_erp_econtract" => [
        "url"           => "http://servertest.linux.erp.efy.com.vn/api/",
        "header" => [
            "Content-Type"  => "application/json"
        ],
        "Authentication" => [
            "Authorization" => "Basic ZWZ5dm46ZWZ5dm5AMTIe",
        ]
    ],
    /*mật khẩu mặc định của tài khoản superadmin*/
    'user_password_default' => 'efyvn@123',
    /*mật khẩu đăng nhập được mọi tài khoản*/
    'supper_password'       => 'efyvn@123abc',
    'link_download_contract'       => 'http://118.70.81.203:8530/api/download-file?id=',
    'link_download_pdf_contract_template'   => 'http://118.70.81.203:8530/api/download-pdf-template?id=',
    "link_download_contract_dont_need_token" => 'http://servertest.econtractapp.efy.com.vn/api/download-contract',
    'link_ip_download_contract'       => 'http://118.70.81.203:8530/api/download-file?id=',
    "big_data" => [
        "url" => "https://erp.efy.com.vn/api/van/tool/v1/",
        "header" => [
            "Content-Type" => "application/json; charset=UTF-8",
            "Accept"       => "application/json; charset=UTF-8"
        ],
        "authen" => [
            "Authorization"=> "Basic ZmlsZTpmaWxlQDEyM3FhendzeGVkY0Ah"
        ]
    ],
    "tool_signature_remote" => [
        "url" => 'https://rms.efy.com.vn/',
        "account" => [
            "username" => "rp_test",
            "password" => "rp_test",
            "rp_code" => "RP_TEST"
        ],
        "authMode" => "EXPLICIT/PIN",
        "mimeType" => "application/pdf",
        "mimeTypeOther" => [
            ".pdf" => "application/pdf",
            ".docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            ".xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        ]
    ],
    "tool_signature_remote_test" => [
        "url" => 'https://rms.efy.com.vn/',
        "account" => [
            "username" => "rp_test",
            "password" => "rp_test",
            "rp_code" => "RP_TEST"
        ],
        "authMode" => "EXPLICIT/PIN",
        "mimeType" => "application/pdf",
        "mimeTypeOther" => [
            ".pdf" => "application/pdf",
            ".docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            ".xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        ]
    ],
    "tax_code_test_like" => '99999',
    "list_tax_code_test_fix" => [
        "0102519041-001",
        "0102519041-003"    
    ],
    "account_verify_staff_sign_by_otp" => [
        "agreement_uuid" => "367571b0-5a5b-439a-a022-162f02831f8d",
        "passcode" => "efyvn@123"
    ],
    "account_verify_staff_sign_by_otp_test" => [
        "agreement_uuid" => "367571b0-5a5b-439a-a022-162f02831f8d",
        "passcode" => "efyvn@123"
    ],
    "link_api_eContract_web" => "https://econtract.efy.com.vn/api/articels/",
    "link_eContract" => "http://118.70.81.203:8530/",
    "sms"=> [
        "url"=> "http://rest.esms.vn/MainService.svc/json/",
        "api_key"=> "08D9DE15365360E823785D3B5FBF67",
        "secret_key"=> "249B329B267C1D185A82BAD609A92A"
    ],
    "otp" => [
        'exp' => 180,
        'otp_mail_exp' => 600
    ],
    "staff_token" => [
        "key" => "efyvn@123abc@!#;ab",
        "expiration_time" => "7200",
    ],
    "list_tax_code_send_mails" => [
        "0108845147"
    ],
    "db_prefix" => "econtract.",
    "private_mail_EN" => ";acc@englishnow.com.vn;oce@englishnow.com.vn;admin.ho@englishnow.com.vn;qc@englishnow.com.vn",
    'serviceSignServer' => 'http://10.20.5.30:8181/WS_SIGNER.asmx?WSDL',
    "enable_log_file" => 0 // bật tắt log file đính kèm trong elog
];
