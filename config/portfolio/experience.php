<?php

return [
    [
        'title' => 'Software Engineer (PHP)',
        'company' => 'Maxwell Geosystems Pvt Ltd',
        'period' => 'Apr 2021 - Present',
        'location' => 'Kochi, India',
        'tags' => ['PHP 8.3', 'MySQL', 'SaaS', 'Laravel', 'Highcharts'],
        'description' => 'Lead backend engineer on MissionOS — a multi-tenant SaaS platform ingesting real-time construction sensor data. Responsible for performance, migration, and reporting systems.',
        'bullets' => [
            'Reduced sensor dashboard query times from ~6-8s to under 500ms on 10M+ row tables via composite indexing and EXPLAIN-driven query restructuring — a 12x improvement.',
            'Led end-to-end migration of 80,000+ line PHP 5.6 codebase to PHP 8.3 with zero downtime, introducing typed properties, match expressions, and modern security headers.',
            'Built automated bulk reporting pipeline processing 50,000+ sensor points per run, generating PDFs and Highcharts visualisations — saving ~8 hrs/week of manual effort.',
            'Managed version control and deployments via Bitbucket; tracked agile sprints with Jira.',
        ],
        'link' => '#',
    ],
    [
        'title' => 'Software Engineer (Backend)',
        'company' => 'ClaySys Technologies Pvt Ltd',
        'period' => 'Jun 2019 - Apr 2021',
        'location' => 'Kochi, India',
        'tags' => ['MS SQL Server', 'T-SQL', 'SharePoint', 'PHP'],
        'description' => 'Backend developer for enterprise financial-sector form applications, owning database architecture and stored procedure logic for multi-client deployments.',
        'bullets' => [
            'Architected MS SQL Server schemas and complex T-SQL stored procedures for financial approval workflows with audit trails and multi-level RBAC.',
            'Automated data submission workflows via ClaySys AppForms + SharePoint integration, eliminating manual entry for 3 client finance teams.',
            'Delivered end-to-end backend development from schema design through API responses.',
        ],
        'link' => '#',
    ],
];
