<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Créer',
        'edit' => 'Éditer',
        'update' => 'Mettre à jour',
        'new' => 'Nouveau',
        'cancel' => 'Annuler',
        'save' => 'Sauvegarder',
        'delete' => 'Supprimer',
        'delete_selected' => 'Supprimer la sélection',
        'search' => 'Recherche...',
        'back' => 'Revenir à la liste',
        'are_you_sure' => 'Vous êtes sûr ?',
        'no_items_found' => 'Aucun élément trouvé',
        'created' => 'Créé avec succès',
        'saved' => 'Sauvegardé avec succès',
        'removed' => 'Supprimer avec succès',
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
