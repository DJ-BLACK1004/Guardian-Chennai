<?php
/**
 * Content data. Service names, industries, training, management and clients
 * come from the original guardianchennai.com site. Descriptive copy around
 * them is written to stay within what the original site states.
 */

$SERVICES = [
    [
        'slug'  => 'security-services',
        'name'  => 'Security Services – Armed and Unarmed',
        'short' => 'Armed and unarmed security personnel for commercial, industrial, institutional and residential sites.',
        'icon'  => 'shield',
        'tags'  => ['PSARA Certified', 'Armed / Unarmed', '24/7 Night Beat'],
        'intro' => 'Guardian provides armed and unarmed security personnel for businesses, institutions and residential communities. Every guard is inducted only after antecedent verification and structured training.',
        'benefits' => [
            'Personnel verified for track record and trustworthiness before induction',
            'Training approved under the Private Security Regulations Act',
            'Assignment-specific training before deployment',
            'Regular performance evaluation at short intervals',
        ],
        'delivery' => [
            'We study the site and the client\'s security requirement.',
            'Suitable armed or unarmed personnel are selected and trained for the assignment.',
            'Personnel are deployed and supervised by the operations team.',
            'Periodic on-the-job training and evaluation keep standards up.',
        ],
        'features' => ['Armed security personnel', 'Unarmed security personnel', 'Antecedent-verified staff', 'Customised pre-induction training', 'Supervision by operations management'],
    ],
    [
        'slug'  => 'escort-services',
        'name'  => 'Escort Services – Armed and Unarmed',
        'short' => 'Armed and unarmed escort support for people, valuables and movement.',
        'icon'  => 'users',
        'tags'  => ['Executive Protection', 'Valuables Transit', 'Armed Escorts'],
        'intro' => 'Guardian offers armed and unarmed escort services, delivered by trained and verified personnel under the supervision of an experienced operations team.',
        'benefits' => [
            'Trained and verified escort personnel',
            'Armed or unarmed support based on the requirement',
            'Operations team led by management with defence experience',
        ],
        'delivery' => [
            'You share the movement and the level of protection needed.',
            'We assign suitable armed or unarmed escort personnel.',
            'The operations team coordinates and supports the assignment.',
        ],
        'features' => ['Armed escort option', 'Unarmed escort option', 'Verified personnel', 'Operations support'],
    ],
    [
        'slug'  => 'cash-van-services',
        'name'  => 'Cash Van Services',
        'short' => 'Secure cash transit support for banks and financial institutions.',
        'icon'  => 'truck',
        'tags'  => ['GPS Live Tracked', 'Armed Vault Guard', 'Bank Standard'],
        'intro' => 'Guardian provides cash van services for organisations that need cash moved with care. Guardian already serves banking and financial institutions among its client segments.',
        'benefits' => [
            'Experience serving banking and financial institutions',
            'Trained, antecedent-verified personnel',
            'Management oversight of every assignment',
        ],
        'delivery' => [
            'We understand your cash movement requirement.',
            'Trained personnel are assigned to the service.',
            'The operations team supervises and supports delivery.',
        ],
        'features' => ['Cash transit support', 'Verified personnel', 'Supervised operations'],
    ],
    [
        'slug'  => 'event-management',
        'name'  => 'Event Management',
        'short' => 'Trained personnel and coordination for events that need managed security.',
        'icon'  => 'calendar',
        'tags'  => ['Crowd Control', 'VIP Security', 'Quick Response'],
        'intro' => 'Guardian provides event management support, bringing trained personnel and organised supervision to events of different kinds.',
        'benefits' => [
            'Trained personnel suited to the event',
            'Coordinated supervision by the operations team',
            'Single point of contact for your requirement',
        ],
        'delivery' => [
            'Tell us about the event, venue and expected needs.',
            'We plan the personnel and coordination required.',
            'Our team is deployed and supervised through the event.',
        ],
        'features' => ['Event-specific planning', 'Trained personnel', 'On-site supervision'],
    ],
    [
        'slug'  => 'antecedent-verification',
        'name'  => 'Antecedent Verification',
        'short' => 'Background verification of personnel for our clients.',
        'icon'  => 'user-check',
        'tags'  => ['Police Verification', 'Address Check', 'Track Record'],
        'intro' => 'Antecedent verification is central to how Guardian works: every security person is inducted after thorough verification of antecedents and track record. Guardian also offers this service to its clients.',
        'benefits' => [
            'A process Guardian already applies to its own workforce',
            'Helps clients make informed hiring decisions',
            'Handled by a team with security-industry experience',
        ],
        'delivery' => [
            'You share the verification requirement.',
            'Guardian carries out the antecedent verification.',
            'The outcome is shared with you for your decision.',
        ],
        'features' => ['Antecedent checks', 'Track-record verification', 'Service for client requirements'],
    ],
    [
        'slug'  => 'intelligence-investigation',
        'name'  => 'Intelligence & Investigation Services',
        'short' => 'Intelligence and investigation support for client requirements.',
        'icon'  => 'search',
        'tags'  => ['Ex-Police Advisors', 'Confidential Scoping', 'Corporate Risk'],
        'intro' => 'Guardian offers intelligence and investigation services, backed by a management team and advisory board that includes former defence and police officers.',
        'benefits' => [
            'Guidance from an advisory board of experts and former defence and police officers',
            'Experienced security-industry management',
            'Confidential handling of client requirements',
        ],
        'delivery' => [
            'You describe the matter and the information needed.',
            'Guardian scopes the requirement with you.',
            'The team carries out the work and reports back.',
        ],
        'features' => ['Intelligence services', 'Investigation services', 'Expert advisory guidance'],
    ],
    [
        'slug'  => 'safety-security-audit',
        'name'  => 'Safety and Security Audit',
        'short' => 'Review of a site\'s safety and security arrangements.',
        'icon'  => 'clipboard',
        'tags'  => ['Vulnerability Scan', 'Risk Assessment', 'PSARA Standards'],
        'intro' => 'Guardian offers safety and security audits that help organisations review how well their premises and arrangements are protected.',
        'benefits' => [
            'An experienced security team looks at your site',
            'Clearer view of your current arrangements',
            'Input from a team that guards a wide range of sites',
        ],
        'delivery' => [
            'We agree the scope of the audit with you.',
            'Our team reviews the premises and current arrangements.',
            'Findings are discussed with you.',
        ],
        'features' => ['Site review', 'Safety and security assessment', 'Discussion of findings'],
    ],
];

$INDUSTRIES = [
    ['name' => 'IT',                                  'icon' => 'cpu',        'text' => 'Security for IT companies and technology campuses.'],
    ['name' => 'Energy Sector',                       'icon' => 'zap',        'text' => 'Dependable protection for energy sector facilities.'],
    ['name' => 'Banking & Financial Institutions',    'icon' => 'landmark',   'text' => 'Security for banks and financial institutions.'],
    ['name' => 'Academic Institutions',               'icon' => 'graduation', 'text' => 'Safe campuses for schools, colleges and universities.'],
    ['name' => 'Factories',                           'icon' => 'factory',    'text' => 'Site security for factories and manufacturing units.'],
    ['name' => 'Large & Ultra-Modern Industries',     'icon' => 'building',   'text' => 'Security for large, modern industrial operations.'],
    ['name' => 'Residential Apartments',              'icon' => 'home',       'text' => 'Reliable security for apartment communities.'],
];

$TRAINING = [
    'Exhaustive theoretical and practical training in our training centre',
    'Customised training before induction into each assignment',
    'Periodic on-the-job training to evaluate and upgrade skills',
    'Performance evaluation at short intervals',
    'Low employee turnover, supported by sound HR policies and practices',
];

$TEAM = [
    [
        'name' => 'Mr. R. Saravanan',
        'role' => 'Managing Director',
        'text' => 'A law graduate and Vice Chairman of CAPSI, Tamil Nadu & Pondicherry (an association of security agencies recognised by the Government). He is an active member of Friends of Police, plays a role in community policing, and is pursuing a Doctorate in Security Management.',
    ],
    [
        'name' => 'R. Balasubramanian',
        'role' => 'Senior General Manager',
        'text' => 'A commerce graduate with wide experience in the security industry, serving clients with customer orientation as the guiding principle.',
    ],
    [
        'name' => 'Capt. T. Dayalan',
        'role' => 'Manager – Operations',
        'text' => 'Served in the Indian Army and is academically trained to provide professional security service, with good HR relations.',
    ],
];

$CLIENTS = [
    'Wipro Technologies', 'Sutherland Global Services', 'Tidel Park – CBRE', 'Elnet Technologies Ltd',
    'Thamarai Techno Park', 'NIOT', 'Canara Bank', 'Karur Vysya Bank', 'Syndicate Bank',
    'Pondicherry University', 'V.G. Hospital', 'DHL Leemuir Head Pvt Ltd', 'TVS-INEL-Nippon',
    'Nilkamal', 'Toshniwal', 'Packwell Packg. Ltd', 'Ambattur Clothing Ltd', 'Sri Renga Apparels (P) Ltd',
    'CPC (P) Ltd', 'Southern Group', 'Oriental Freight Systems', 'Artic Products Pvt', 'NOCL',
    'Medical College and Hospital',
];

$PROCESS = [
    ['Understand', 'We listen first and understand your security requirements.'],
    ['Assess',     'We evaluate the environment and what the site needs.'],
    ['Deploy',     'Suitably trained and verified personnel are deployed.'],
    ['Support',    'We stay in touch and support operations on an ongoing basis.'],
];

$WHY = [
    ['Professional Personnel',       'users',   'Every person is inducted only after thorough antecedent verification and a check of track record.'],
    ['Reliable Operations',          'shield',  'Over two decades in the security industry, serving commercial enterprises across segments.'],
    ['Client-Centric Approach',      'badge',   'A region-focused approach across Tamil Nadu and Pondicherry delivers value-added service.'],
    ['Strong Management',            'building','An experienced core team guided by an advisory board of experts and former defence and police officers.'],
    ['Security-Focused Culture',     'lock',    'Theory and practical training, assignment-specific induction and regular evaluation.'],
    ['Consistent Service Quality',   'check',   'Periodic on-the-job training and sound HR practices keep employee turnover low.'],
];
