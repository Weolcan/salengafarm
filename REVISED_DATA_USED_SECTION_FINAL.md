# REVISED DATA USED SECTION - FINAL
## For ManuscriptSalenga.md - Chapter III Methodology
## (Following Sample 1 & 2 Format - EXACT Structure)

---

## Data Used

Data Used refers to the specific information and datasets employed to support the development and operation of the system. It describes the types of data involved and explains how data will be collected, stored, processed, and managed to achieve the system's objectives. In the context of the Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm, data will encompass user accounts, plant inventory records, client requests, sales transactions, site visit documentation, and supporting system information.

The system will utilize a combination of structured database storage and file-based storage to maintain data integrity and support operational requirements. Structured data, including user profiles, plant specifications, transaction records, and request details, will be stored in a relational database management system (MySQL). Unstructured data, such as plant photographs, site visit documentation, user avatars, and generated PDF reports, will be stored in the file system with references maintained in the database. This hybrid approach will ensure efficient data retrieval, scalability, and support for multimedia content essential to plant catalog presentation and site visit documentation.

### Datasets of the Project

Datasets are organized collections of data essential for maintaining accurate and efficient operations within the plant inventory and site visit management system. They can be structured or unstructured, depending on the nature of the information (e.g., plant specifications, transaction records, site visit checklists, user profiles). These datasets will be fundamental to the system's operation, making information such as plant availability, pricing, client requests, and site inspection results readily accessible and up-to-date. The data will be required to be secure, accurate, and reliable to prevent errors and maintain proper processing of inventory management, sales transactions, and client service operations, thereby ensuring the system's integrity and operational effectiveness.

### Data Dictionary of the Project

The Data Dictionary will contain key information about the data structures used in the system. Data will be obtained from Salenga Farm's operational records and requirements, including plant inventory specifications, client information, transaction histories, and site visit documentation. The system will be designed to accommodate both registered users (clients with accounts) and online visitors (unregistered users who can browse the catalog and submit basic requests).


**Figure [X]. Database Structure of Salenga Farm Inventory System**

*(Insert both images here - Image 2 and Image 1 are connected and displayed together as they show the complete database structure in one schema. The images show all 20 tables from autofill_caches through users in MySQL Workbench.)*

As illustrated in Figure [X], MySQL Workbench will display the database schema of the Salenga Farm system, comprising twenty (20) structured and standardized tables that will facilitate the system's primary functions. The database will be organized into two main categories: core business tables and system support tables.

The core business tables will include users, which will manage all user accounts and role-based access control; plants, which will store the complete inventory of available plants with pricing, stock levels, and specifications; display_plants, which will maintain the public-facing plant catalog with care information and images; plant_requests, which will track all client inquiries and requests for quotations; site_visits, which will document field inspections with geolocation data and digital checklists; sales, which will record all walk-in point-of-sale transactions; and categories, which will organize plants into groups such as shrubs, herbs, palms, trees, grasses, bamboo, and fertilizers.

The database will also include system support tables that will ensure proper system operation and data management. The notifications table will manage system alerts and user notifications for request updates and system events. The cache and cache_locks tables will support Laravel's caching system for improved performance. The migrations table will track database version control and schema changes throughout development. The password_reset_tokens table will support secure password recovery. The jobs, job_batches, and failed_jobs tables will support Laravel's queue system for background task processing, such as email notifications and report generation.

Additionally, the database will include permission management tables from the Spatie Laravel-Permission package: permissions, roles, model_has_permissions, model_has_roles, and role_has_permissions. While these tables will be present in the database structure, the system will implement a simplified role-based access control through the role field in the users table, which will separate super admin, admin, manager, client, and standard user roles. The autofill_caches table will be designed to store frequently used form data for site visit entries, allowing faster data entry for recurring client information and location details.

---

**END OF DATA USED SECTION**

**Next section in your manuscript should be: User Design**

---

## Notes for Implementation:

1. **Image Placeholders**: Replace `[X]` with actual figure number according to your manuscript's figure sequence
2. **Image Insertion**: Insert both Image 2 and Image 1 together (they're connected in one schema)
3. **Structure**: Exactly matches Sample 1 and Sample 2 - only has Data Used, Datasets, and Data Dictionary
4. **NO Extra Sections**: Removed "Data Storage Architecture" and "Database Relationships" - these are NOT in the samples
5. **Tense Consistency**: Uses present tense for current facts/how system works, past tense for completed actions/design decisions
6. **Next Section**: After this, your manuscript should continue with "User Design" section
