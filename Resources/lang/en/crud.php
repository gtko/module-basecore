<?php

return [

    'profil' => [
        'maj_email' => "Update your account profile information and email address.",
        'new_photo' => "Select a new photo",
        'remove_photo' => "Delete photo",
        'two_factor' => 'Two-factor authentication',
        'add_securite' => "Add extra security to your account by using two-factor authentication.",
        'two_factor_enable' => "You have enabled two-factor authentication.",
        'two_factor_disable' => "Two-factor authentication is not enabled.",
        'token' => "When two-factor authentication is enabled, you will be prompted for a secure, random token during authentication. You can retrieve this token from the Google Authenticator app on your phone.",
        'qr' => "Two-factor authentication is now enabled. Scan the following QR code using your phone's authentication app.",
        'code_recup' => "Keep these recovery codes in a secure password manager. They can be used to recover access to your account if your two-factor authentication device is lost.",
        'activate' => 'Activate',
        'code_recup_reg' => 'Regenerate Recovery Codes',
        'code_recup_echo' => 'View recovery codes',
        'disable' => 'Disable',

        'session' => 'Navigation Sessions',
        'deco_all' => "Manage and disconnect your active sessions on other browsers and devices.",
        'deco_all_mobil' => "If necessary, you can log out of all your other browsing sessions on all your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you believe your account has been compromised, you should also update your password.",
        'browser_deco' => 'Logging out of other browser sessions',
        'finish' => 'Completed.',
        'deco_browser' => 'Disconnect from other browser sessions.',
        'deco_browser_all' => 'Please enter your password to confirm that you wish to log out of your other browsing sessions on all your devices.',
        'Password' => 'Password',
        'cancel' => 'Cancel',
        'deco_session_browser' => 'Logging out of other browser sessions',
        'maj_password' => 'Update password',
        'password_length' => 'Make sure your account uses a long, random password to stay secure.',
        'password_actual' => 'Current password',
        'new_password' => 'New password',
        'new_password_confirmed' => 'Confirm the new password',

    ],

    'create_user' => [
        'you_are' => 'You are?',
        'choose_type' => 'Choose a type',
        'individual' => 'An individual',
        'company' => 'A company',
        'company_name' => 'Company name',
        'male' => 'Male',
        'female' => 'Femal',
        'other' => 'Other',
        'address' => 'Address',
        'city' => 'City',
        'code_zip' => 'Zip code',
        'country' => 'Country',
        'choice_country' => 'Choose your country',
        'phone' => "Phone",
        'email' => "Email",
        'update_info_title' => "Update password",
        'update_info' => "Update your profile information",
    ],


    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Éditer',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to list',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'personnes' => [
        'name' => 'Personnes',
        'index_title' => 'Personnes List',
        'new_title' => 'New Personne',
        'create_title' => 'Create Personne',
        'edit_title' => 'Edit Personne',
        'show_title' => 'Show Personne',
        'inputs' => [
            'address_id' => 'Address',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'date_birth' => 'Date Birth',
            'gender' => 'Gender',
        ],
    ],

    'emails' => [
        'name' => 'Emails',
        'index_title' => 'Emails List',
        'new_title' => 'New Email',
        'create_title' => 'Create Email',
        'edit_title' => 'Edit Email',
        'show_title' => 'Show Email',
        'inputs' => [
            'email' => 'Email',
        ],
    ],

    'phones' => [
        'name' => 'Phones',
        'index_title' => 'Phones List',
        'new_title' => 'New Phone',
        'create_title' => 'Create Phone',
        'edit_title' => 'Edit Phone',
        'show_title' => 'Show Phone',
        'inputs' => [
            'phone' => 'Phone',
        ],
    ],

    'addresses' => [
        'name' => 'Addresses',
        'index_title' => 'Addresses List',
        'new_title' => 'New Address',
        'create_title' => 'Create Address',
        'edit_title' => 'Edit Address',
        'show_title' => 'Show Address',
        'inputs' => [
            'address' => 'Address',
            'city' => 'City',
            'country_id' => 'Country',
            'code_zip' => 'Code Zip',
        ],
    ],

    'clients' => [
        'name' => 'Clients',
        'index_title' => 'Clients List',
        'new_title' => 'New Client',
        'create_title' => 'Create Client',
        'edit_title' => 'Edit Client',
        'show_title' => 'Show Client',
        'inputs' => [
            'personne_id' => 'Personne',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'password' => 'Password',
            'personne_id' => 'Personne',
        ],
    ],

    'devis' => [
        'name' => 'Devis',
        'index_title' => 'Devis List',
        'new_title' => 'New Devi',
        'create_title' => 'Create Devi',
        'edit_title' => 'Edit Devi',
        'show_title' => 'Show Devi',
        'inputs' => [
            'dossier_id' => 'Dossier',
            'commercial_id' => 'Commercial',
            'data' => 'Data',
            'tva_applicable' => 'Tva Applicable',
            'fournisseur_id' => 'Fournisseur',
        ],
    ],

    'dossiers' => [
        'name' => 'Dossiers',
        'index_title' => 'Dossiers List',
        'new_title' => 'New Dossier',
        'create_title' => 'Create Dossier',
        'edit_title' => 'Edit Dossier',
        'show_title' => 'Show Dossier',
        'inputs' => [
            'clients_id' => 'Client',
            'source_id' => 'Source',
            'status_id' => 'Status',
            'commercial_id' => 'Commercial',
            'date_start' => 'Date Start',
        ],
    ],

    'statuses' => [
        'name' => 'Statuses',
        'index_title' => 'Statuses List',
        'new_title' => 'New Status',
        'create_title' => 'Create Status',
        'edit_title' => 'Edit Status',
        'show_title' => 'Show Status',
        'inputs' => [
            'label' => 'Label',
            'weight' => 'Weight',
        ],
    ],

    'brands' => [
        'name' => 'Brands',
        'index_title' => 'Brands List',
        'new_title' => 'New Brand',
        'create_title' => 'Create Brand',
        'edit_title' => 'Edit Brand',
        'show_title' => 'Show Brand',
        'inputs' => [
            'label' => 'Label',
        ],
    ],

    'sources' => [
        'name' => 'Sources',
        'index_title' => 'Sources List',
        'new_title' => 'New Source',
        'create_title' => 'Create Source',
        'edit_title' => 'Edit Source',
        'show_title' => 'Show Source',
        'inputs' => [
            'label' => 'Label',
        ],
    ],

    'countries' => [
        'name' => 'Countries',
        'index_title' => 'Countries List',
        'new_title' => 'New Country',
        'create_title' => 'Create Country',
        'edit_title' => 'Edit Country',
        'show_title' => 'Show Country',
        'inputs' => [
            'name' => 'Name',
            'iso' => 'Iso',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
