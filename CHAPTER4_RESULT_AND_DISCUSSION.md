CHAPTER IV

RESULT AND DISCUSSION

This chapter presents the results gathered from the evaluation of the Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm. The discussion follows the system's specific objectives, focusing on the functionalities designed for the Super Administrator, Administrator, Client, and User. The results were derived from system testing, user feedback through surveys, and observations made during the system deployment.

The system allows Super Administrators to manage user accounts, assign roles, and monitor system logs for security and maintenance purposes. Administrators evaluated the functions that allow them to manage plant inventory, process sales transactions, handle client requests, and conduct site visits. The system enables Administrators to add, update, and delete plant records, generate PDF quotations, and send email notifications to clients. Clients tested the ability to submit requests for quotation (RFQ), download approved quotations, and participate in assigned site visits by uploading required documents. Regular Users assessed the functionality that allows them to browse the plant catalog, submit plant inquiries, and view inquiry responses from administrators.


Super Admin Module That Manages User Accounts and Assigns Roles

This module allows the Super Admin to manage user accounts and assign roles within the system. It enables the Super Admin to create new user accounts, update existing user information, delete accounts, and assign appropriate roles such as Admin, Client, or User. This functionality ensures proper system management, security, and access control by restricting functions to authorized users only.

Figure [X] shows the interface of the Super Admin Module for managing user accounts. Through this module, the Super Admin can view a list of all registered users, including their names, email addresses, roles, and account status. The interface provides action buttons for editing user details, changing roles, and removing accounts when necessary. This feature maintains system organization and ensures that only authorized personnel have access to administrative functions.

[INSERT FIGURE: GUI for Super Admin Module That Manages User Accounts]

The pseudocode in Figure [X+1] shows how the Super Admin manages user accounts within the system. It begins by displaying the user management interface with a table listing all users and their details. When the Super Admin clicks "Add User," the system opens a registration form where new user information can be entered, including name, email, password, and assigned role. If the "Edit" button is clicked, the system retrieves the selected user's data and displays it in an editable form. When changes are saved, the system updates the user information in the database. If the "Delete" button is clicked, the system displays a confirmation dialog to prevent accidental deletions. Upon confirmation, the user account is removed from the system. This function ensures efficient user management and maintains accurate account records.

FUNCTION: Super Admin Manages User Accounts
BEGIN
    Display "User Management" Interface
    Load AllUsers FROM Database
    
    Display UserTable WITH columns:
        Name, Email, Role, Status, Actions
    
    WHEN "Add User" Clicked:
        Display RegistrationForm
        IF InputValid THEN
            Create NewUser IN Database
            Assign Role TO NewUser
            Refresh UserTable
            Display "User created successfully"
        END IF
    
    WHEN "Edit" Clicked FOR SelectedUser:
        Retrieve UserData FROM Database
        Display EditForm WITH UserData
        IF UpdateValid THEN
            Update UserRecord IN Database
            Refresh UserTable
            Display "User updated successfully"
        END IF
    
    WHEN "Delete" Clicked FOR SelectedUser:
        Display ConfirmationDialog
        IF Confirmed THEN
            Delete UserAccount FROM Database
            Refresh UserTable
            Display "User deleted successfully"
        END IF
    
    Enable SearchAndFilter BY Name, Email, Role
END

Figure [X+1]. Pseudocode for Super Admin Module That Manages User Accounts


Super Admin Module That Monitors System Logs

This module allows the Super Admin to view, monitor, and manage system logs for security and maintenance purposes. System logs record all important activities within the application, including user logins, data modifications, errors, and system events. By accessing these logs, the Super Admin can track system performance, identify potential security issues, and troubleshoot errors efficiently.

Figure [X] shows the System Logs interface where the Super Admin can view detailed log entries. Each log entry includes information such as the timestamp, log level (info, warning, error), message description, and the user or system component that generated the log. The interface provides filtering options to search logs by date range, log level, or specific keywords, making it easier to locate relevant information quickly.

[INSERT FIGURE: GUI for Super Admin Module That Monitors System Logs]

The pseudocode in Figure [X+1] illustrates how the system log monitoring function operates. When the Super Admin accesses the logs page, the system retrieves log entries from the Laravel log files and displays them in a paginated table. The Super Admin can filter logs by selecting a date range, choosing a specific log level (such as error or warning), or entering keywords in the search box. The system also provides options to download logs as a file for backup purposes or clear old logs to free up storage space. This functionality helps maintain system health, ensures accountability, and supports quick resolution of technical issues.

FUNCTION: Super Admin Monitors System Logs
BEGIN
    Display "System Logs" Interface
    Load LogEntries FROM LogFiles
    
    Display LogTable WITH columns:
        Timestamp, Level, Message, Context
    
    WHEN FilterApplied:
        Get FilterCriteria (DateRange, LogLevel, Keyword)
        Filter LogEntries BASED ON Criteria
        Display FilteredResults
    
    WHEN "Download Logs" Clicked:
        Generate LogFile
        Download LogFile TO UserDevice
        Display "Logs downloaded successfully"
    
    WHEN "Clear Logs" Clicked:
        Display ConfirmationDialog
        IF Confirmed THEN
            Delete OldLogEntries FROM LogFiles
            Refresh LogTable
            Display "Logs cleared successfully"
        END IF
    
    Enable Pagination FOR LargeLogData
    Enable RealTimeSearch WITHIN LogEntries
END

Figure [X+1]. Pseudocode for Super Admin Module That Monitors System Logs


Admin Module That Manages Plant Inventory

This module allows the Administrator to manage the plant inventory effectively. Through this feature, the Admin can add new plant records, update existing plant information, delete plants from the inventory, and upload plant photos. The system maintains accurate stock levels, pricing information, and plant specifications, ensuring that the catalog remains up-to-date for clients and users.

Figure [X] shows the Plant Inventory Management interface where the Administrator can view all plants in the system. The interface displays a table with plant names, categories, stock quantities, prices, and action buttons for editing or deleting records. The Admin can also use the search and filter functions to quickly locate specific plants by name or category.

[INSERT FIGURE: GUI for Admin Module That Manages Plant Inventory]

The pseudocode in Figure [X+1] demonstrates how the plant inventory management function works. When the Admin accesses the inventory page, the system retrieves all plant records from the database and displays them in a table. If the "Add Plant" button is clicked, a form appears where the Admin can enter plant details such as name, scientific name, category, stock quantity, price, and upload a photo. When the "Edit" button is clicked for a specific plant, the system loads the plant's current data into an editable form. After making changes, the Admin saves the updates, and the system refreshes the inventory table. If the "Delete" button is clicked, the system asks for confirmation before removing the plant record and its associated photo from storage. This function ensures that the plant catalog remains accurate, organized, and accessible.

FUNCTION: Admin Manages Plant Inventory
BEGIN
    Display "Plant Inventory" Interface
    Load AllPlants FROM Database
    
    Display PlantTable WITH columns:
        Name, Category, Stock, Price, Photo, Actions
    
    WHEN "Add Plant" Clicked:
        Display PlantForm
        IF InputValid THEN
            Upload PlantPhoto TO Storage
            Create PlantRecord IN Database
            Refresh PlantTable
            Display "Plant added successfully"
        END IF
    
    WHEN "Edit" Clicked FOR SelectedPlant:
        Retrieve PlantData FROM Database
        Display EditForm WITH PlantData
        IF UpdateValid THEN
            IF NewPhoto Uploaded THEN
                Delete OldPhoto FROM Storage
                Upload NewPhoto TO Storage
            END IF
            Update PlantRecord IN Database
            Refresh PlantTable
            Display "Plant updated successfully"
        END IF
    
    WHEN "Delete" Clicked FOR SelectedPlant:
        Display ConfirmationDialog
        IF Confirmed THEN
            Delete PlantPhoto FROM Storage
            Delete PlantRecord FROM Database
            Refresh PlantTable
            Display "Plant deleted successfully"
        END IF
    
    Enable SearchAndFilter BY Name, Category, Stock
    Enable BulkUpdate FOR MultipleRecords
END

Figure [X+1]. Pseudocode for Admin Module That Manages Plant Inventory


Admin Module That Processes Walk-In Sales Transactions

This module allows the Administrator to process walk-in sales transactions through a point-of-sale (POS) interface. The system enables the Admin to select plants, specify quantities, calculate totals automatically, and complete sales transactions. Upon completing a sale, the system automatically deducts the sold quantities from the inventory and generates a sales record for tracking and reporting purposes.

Figure [X] shows the Walk-In Sales interface where the Administrator can process customer purchases. The interface displays available plants with their current stock levels and prices. The Admin can add plants to the cart, adjust quantities, and view the running total. Once the customer is ready to pay, the Admin clicks the "Complete Sale" button to finalize the transaction.

[INSERT FIGURE: GUI for Admin Module That Processes Walk-In Sales]

The pseudocode in Figure [X+1] explains how the walk-in sales processing function operates. When the Admin opens the POS interface, the system loads all available plants from the inventory. The Admin selects plants and enters the quantity for each item. The system calculates the subtotal for each item and the grand total for the entire transaction. When the "Complete Sale" button is clicked, the system validates that sufficient stock is available for all items. If stock is sufficient, the system creates a sale record in the database, deducts the sold quantities from the plant inventory, and displays a success message. If any item has insufficient stock, the system alerts the Admin and prevents the transaction from completing. This function ensures accurate inventory tracking and efficient sales processing.

FUNCTION: Admin Processes Walk-In Sales
BEGIN
    Display "Point of Sale" Interface
    Load AvailablePlants FROM Database
    Initialize ShoppingCart AS Empty
    
    Display PlantList WITH Stock AND Price
    
    WHEN PlantSelected:
        Get PlantID, Quantity
        IF Quantity <= AvailableStock THEN
            Add Item TO ShoppingCart
            Calculate ItemSubtotal
            Update GrandTotal
        ELSE
            Display "Insufficient stock available"
        END IF
    
    Display ShoppingCart WITH Items AND GrandTotal
    
    WHEN "Complete Sale" Clicked:
        FOR EACH Item IN ShoppingCart DO
            Verify StockAvailability
            IF InsufficientStock THEN
                Display "Cannot complete sale - insufficient stock"
                EXIT
            END IF
        END FOR
        
        Create SaleRecord IN Database
        FOR EACH Item IN ShoppingCart DO
            Deduct Quantity FROM PlantStock
            Update InventoryRecord
        END FOR
        
        Clear ShoppingCart
        Display "Sale completed successfully"
        Refresh PlantList
    
    Enable RemoveItem FROM ShoppingCart
    Enable UpdateQuantity IN ShoppingCart
END

Figure [X+1]. Pseudocode for Admin Module That Processes Walk-In Sales


Admin Module That Manages Client Requests and Generates Quotations

This module allows the Administrator to manage client requests for quotation (RFQ) and user plant inquiries. The system displays all submitted requests in a tabbed interface, separating client RFQs from user inquiries. For client RFQs, the Admin can set pricing for each requested plant, generate PDF quotations, and send them via email. For user inquiries, the Admin can set availability status for each plant and send responses with remarks.

Figure [X] shows the Request Management interface where the Administrator can view and process both client RFQs and user inquiries. The interface includes tabs for "Client Requests" and "User Inquiries," allowing the Admin to switch between request types easily. Each request displays the client or user name, email, request date, status, and action buttons for viewing details and sending responses.

[INSERT FIGURE: GUI for Admin Module That Manages Client Requests]

The pseudocode in Figure [X+1] demonstrates how the request management function works. When the Admin opens the requests page, the system loads all requests from the database and separates them by type. For client RFQs, when the Admin clicks "View Details," the system displays the requested plants with input fields for setting unit prices. The Admin enters prices, and the system calculates totals automatically. When "Generate PDF" is clicked, the system creates a quotation document and saves it to storage. The Admin can then send the quotation via email by clicking "Send Email," which triggers the email service to deliver the PDF to the client. For user inquiries, the Admin sets availability status (Available, Limited Stock, Out of Stock, Pre-order) and adds remarks for each plant. When "Send Response" is clicked, the system updates the inquiry status, creates a notification for the user, and sends an email with a link to view the response. This function streamlines request processing and ensures timely communication with clients and users.

FUNCTION: Admin Manages Requests and Generates Quotations
BEGIN
    Display "Request Management" Interface
    Load ClientRequests FROM Database WHERE Type = 'client'
    Load UserInquiries FROM Database WHERE Type = 'user'
    
    Display TabbedInterface WITH:
        Tab1: "Client Requests"
        Tab2: "User Inquiries"
    
    // For Client RFQs
    WHEN "View Details" Clicked FOR ClientRequest:
        Retrieve RequestData WITH RequestedPlants
        Display RequestDetails WITH PricingForm
        
        WHEN PricesEntered:
            FOR EACH Plant IN RequestedPlants DO
                Calculate TotalPrice = UnitPrice × Quantity
            END FOR
            Calculate GrandTotal
            Update RequestRecord WITH Pricing
        
        WHEN "Generate PDF" Clicked:
            Create PDFDocument WITH RequestData
            Save PDF TO Storage
            Update RequestRecord WITH PDFPath
            Display "PDF generated successfully"
        
        WHEN "Send Email" Clicked:
            IF PDF NOT EXISTS THEN
                Generate PDF
            END IF
            Send Email TO ClientEmail WITH PDFAttachment
            Update RequestStatus TO 'responded'
            Create Notification FOR Client
            Display "Email sent successfully"
    
    // For User Inquiries
    WHEN "View Details" Clicked FOR UserInquiry:
        Retrieve InquiryData WITH RequestedPlants
        Display InquiryDetails WITH AvailabilityForm
        
        WHEN AvailabilitySet:
            FOR EACH Plant IN RequestedPlants DO
                Set AvailabilityStatus
                Add Remarks
            END FOR
            Update InquiryRecord WITH Availability
        
        WHEN "Send Response" Clicked:
            Update InquiryStatus TO 'responded'
            Create Notification FOR User
            Send Email TO UserEmail WITH ResponseLink
            Display "Response sent successfully"
    
    Enable FilterBy Status, Date
    Enable SearchBy Name, Email
END

Figure [X+1]. Pseudocode for Admin Module That Manages Client Requests




Admin Module That Conducts and Records Site Visits

This module allows the Administrator to create, manage, and record site visits for clients. Site visits are essential for assessing client properties, documenting site conditions, and preparing proposals for landscaping or plant installation projects. The system enables the Admin to schedule visits, record GPS coordinates using an interactive map, complete assessment checklists, upload photos and documents, and track the progress of each visit from initial assessment to proposal approval.

Figure [X] shows the Site Visit Management interface where the Administrator can view all scheduled site visits. The interface displays a list of visits with client names, visit dates, locations, and current status (Scheduled, In Progress, Completed). The Admin can create new site visits, edit existing ones, and view detailed information for each visit including checklists and uploaded files.

[INSERT FIGURE: GUI for Admin Module That Conducts Site Visits]

The pseudocode in Figure [X+1] illustrates how the site visit management function operates. When the Admin creates a new site visit, the system displays a form where the Admin enters the client information, visit date, and location. The system includes an interactive map powered by Leaflet where the Admin can click to set GPS coordinates for the site location. Once the visit is created, the Admin can access the visit details page to complete various checklists including Client Data, Site Assessment, Physical Factors, and Proposal sections. For each checklist item, the Admin can upload files, add notes, and mark items as complete. The system also allows the Admin to upload proposal documents such as design quotations and terms and conditions. Clients assigned to the site visit can view the details and upload their required documents through the Client Data section. This function ensures comprehensive documentation of site visits and facilitates collaboration between administrators and clients.

FUNCTION: Admin Conducts and Records Site Visits
BEGIN
    Display "Site Visit Management" Interface
    Load AllSiteVisits FROM Database
    
    Display SiteVisitTable WITH columns:
        Client, Date, Location, Status, Actions
    
    WHEN "Create Site Visit" Clicked:
        Display SiteVisitForm WITH:
            ClientSelection, VisitDate, LocationMap
        
        WHEN MapClicked:
            Capture GPSCoordinates (Latitude, Longitude)
            Display LocationMarker ON Map
        
        IF FormValid THEN
            Create SiteVisitRecord IN Database
            Initialize Checklists (ClientData, Assessment, Physical, Proposal)
            Display "Site visit created successfully"
        END IF
    
    WHEN "View Details" Clicked FOR SelectedVisit:
        Retrieve SiteVisitData FROM Database
        Display DetailedView WITH:
            VisitInformation, Map, Checklists, Files
        
        FOR EACH ChecklistSection DO
            Display ChecklistItems WITH Status
            
            WHEN "Upload File" Clicked FOR Item:
                Upload File TO Storage
                Add FileEntry TO ChecklistData
                Update ChecklistStatus TO 'submitted'
                Display "File uploaded successfully"
            
            WHEN "Delete File" Clicked FOR Item:
                Delete File FROM Storage
                Remove FileEntry FROM ChecklistData
                Update ChecklistStatus IF NoFilesRemain
                Display "File deleted successfully"
        END FOR
        
        WHEN "Upload Proposal" Clicked:
            Upload ProposalDocument TO Storage
            Update SiteVisitRecord WITH ProposalPath
            Display "Proposal uploaded successfully"
        
        WHEN "Update Status" Clicked:
            Update SiteVisitStatus IN Database
            Display "Status updated successfully"
    
    WHEN "Edit" Clicked FOR SelectedVisit:
        Display EditForm WITH CurrentData
        IF UpdateValid THEN
            Update SiteVisitRecord IN Database
            Display "Site visit updated successfully"
        END IF
    
    WHEN "Delete" Clicked FOR SelectedVisit:
        Display ConfirmationDialog
        IF Confirmed THEN
            Delete AssociatedFiles FROM Storage
            Delete SiteVisitRecord FROM Database
            Display "Site visit deleted successfully"
        END IF
    
    Enable FilterBy Status, Date, Client
    Enable MapView FOR AllSiteVisits
END

Figure [X+1]. Pseudocode for Admin Module That Conducts Site Visits


Admin Module That Displays Dashboard Analytics

This module allows the Administrator to view comprehensive dashboard analytics for monitoring system performance and making data-driven decisions. The dashboard displays key metrics including total stock levels, low stock alerts, stock distribution by plant category, and sales analytics by category. Through visual representations such as charts and graphs, the Admin can quickly assess inventory health, identify trends, and take proactive actions to maintain optimal stock levels and improve sales performance.

Figure [X] shows the Admin Dashboard interface where the Administrator can view real-time analytics and statistics. The dashboard displays summary cards showing total stock count and the number of low stock items requiring attention. Interactive charts visualize stock distribution across different plant categories (trees, shrubs, palms, bamboo, grass, herbs) and sales performance by category. The dashboard also shows a list of recent plants added to the inventory and provides quick access to stock update functions.

[INSERT FIGURE: GUI for Admin Module That Displays Dashboard Analytics]

The pseudocode in Figure [X+1] demonstrates how the dashboard analytics function operates. When the Admin accesses the dashboard, the system retrieves data from the database and performs calculations to generate meaningful statistics. The system calculates the total stock by summing all plant quantities across the inventory. It identifies low stock items by filtering plants with quantities below the threshold (less than 10 units). For stock distribution, the system groups plants by category and calculates the total quantity for each category. For sales analytics, the system joins sales records with plant data, groups by category, and calculates the percentage distribution of sales across categories. The system then generates visual charts using Chart.js library to display stock distribution as a doughnut chart and sales distribution as a bar chart. The dashboard updates in real-time whenever inventory or sales data changes, ensuring that administrators always have access to current information for decision-making. This function provides administrators with a comprehensive overview of business operations, helping them identify trends, manage inventory efficiently, and optimize sales strategies.

FUNCTION: Admin Views Dashboard Analytics
BEGIN
    Display "Admin Dashboard" Interface
    
    // Calculate Total Stock
    Calculate TotalStock = SUM(AllPlants.Quantity)
    Display TotalStock IN SummaryCard
    
    // Identify Low Stock Items
    Get LowStockItems FROM Plants WHERE Quantity < 10
    Display LowStockCount IN AlertCard
    Display LowStockList WITH PlantNames AND Quantities
    
    // Calculate Stock Distribution by Category
    FOR EACH Category IN PlantCategories DO
        Calculate CategoryTotal = SUM(Plants.Quantity WHERE Category = CurrentCategory)
        Add CategoryTotal TO StockDistribution
    END FOR
    
    Generate DoughnutChart WITH StockDistribution
    Display StockDistributionChart ON Dashboard
    
    // Calculate Sales Analytics by Category
    Get AllSales FROM SalesTable
    Calculate TotalSalesQuantity = SUM(AllSales.Quantity)
    
    IF TotalSalesQuantity > 0 THEN
        FOR EACH Category IN PlantCategories DO
            Calculate CategorySales = SUM(Sales.Quantity WHERE Plant.Category = CurrentCategory)
            Calculate Percentage = (CategorySales / TotalSalesQuantity) × 100
            Add Percentage TO SalesDistribution
        END FOR
        
        Generate BarChart WITH SalesDistribution
        Display SalesAnalyticsChart ON Dashboard
    ELSE
        Display "No sales data available"
    END IF
    
    // Display Recent Plants
    Get RecentPlants FROM Plants ORDER BY CreatedDate DESC LIMIT 5
    Display RecentPlantsList WITH Names AND AddedDates
    
    // Enable Quick Stock Update
    WHEN "Update Stock" Clicked:
        Display StockUpdateModal WITH AllPlants
        
        WHEN StockUpdated:
            FOR EACH UpdatedPlant DO
                Update PlantQuantity IN Database
            END FOR
            Refresh DashboardData
            Display "Stock updated successfully"
    
    Enable AutoRefresh EVERY 30Seconds
    Enable ManualRefresh Button
END

Figure [X+1]. Pseudocode for Admin Module That Displays Dashboard Analytics


Client Module That Submits Requests for Quotation (RFQ)

This module allows Clients to submit requests for quotation by selecting plants from the catalog and specifying their requirements. Unlike regular user inquiries, client RFQs include detailed information such as quantities, measurements (height, spread, spacing), and pricing preferences. The system processes these requests and generates professional PDF quotations that clients can download and review.

Figure [X] shows the RFQ submission interface where Clients can browse the plant catalog and select plants for their quotation request. The interface displays plant cards with photos, names, and current availability. Clients can click "Add to RFQ" to select plants, specify quantities and measurements, and choose pricing preferences (None, Low cost, High cost) before submitting their request.

[INSERT FIGURE: GUI for Client Module That Submits RFQ]

The pseudocode in Figure [X+1] demonstrates how the RFQ submission function works. When a Client accesses the RFQ page, the system loads all available plants from the catalog. The Client browses plants and adds desired items to their RFQ cart. For each selected plant, the Client enters the quantity and can optionally specify measurements such as height, spread, and spacing. The Client also selects a pricing preference to indicate their budget range. Once all plants are selected, the Client fills in their contact information and submits the RFQ. The system validates the input, creates an RFQ record in the database with request type set to 'client', generates a PDF quotation, and sends email notifications to administrators. The Client receives a confirmation message and can track the status of their RFQ in their dashboard. This function streamlines the quotation request process and ensures that clients receive professional, detailed quotations for their plant needs.

FUNCTION: Client Submits Request for Quotation
BEGIN
    Display "Request for Quotation" Interface
    Load AvailablePlants FROM Database
    Initialize RFQCart AS Empty
    
    Display PlantCatalog WITH Photos AND Details
    
    WHEN PlantSelected:
        Display PlantDetailsModal
        Get Quantity, Height, Spread, Spacing
        Add Plant TO RFQCart WITH Specifications
        Update CartCounter
    
    Display RFQCart WITH SelectedPlants
    
    WHEN "Submit RFQ" Clicked:
        Display ContactForm
        Get ClientName, Email, Phone, Address, Message
        Get PricingPreference (None, LowCost, HighCost)
        
        IF FormValid THEN
            Create RFQRecord IN Database WITH:
                ClientInfo, SelectedPlants, PricingPreference
                RequestType = 'client'
                Status = 'pending'
            
            Generate PDFQuotation WITH RFQData
            Save PDF TO Storage
            Update RFQRecord WITH PDFPath
            
            Send EmailNotification TO Admins
            Create Notification FOR Admins
            
            Display "RFQ submitted successfully"
            Redirect TO SuccessPage WITH RFQNumber
        ELSE
            Display ValidationErrors
        END IF
    
    Enable RemovePlant FROM RFQCart
    Enable UpdateQuantity IN RFQCart
    Enable EditMeasurements FOR SelectedPlants
END

Figure [X+1]. Pseudocode for Client Module That Submits RFQ


Client Module That Participates in Site Visits

This module allows Clients to participate in assigned site visits by viewing visit details and uploading required documents. When an Administrator creates a site visit and assigns it to a client, the client receives access to view the visit information, checklists, and can upload necessary documents such as property information, site photos, and other required files. This collaboration feature ensures that all necessary information is collected efficiently before the site assessment.

Figure [X] shows the Client Site Visit interface where Clients can view their assigned site visits. The interface displays visit details including the scheduled date, location on a map, and checklist items that require client input. Clients can see which documents have been uploaded and which are still pending, making it easy to track their progress.

[INSERT FIGURE: GUI for Client Module That Participates in Site Visits]

The pseudocode in Figure [X+1] explains how the client site visit participation function works. When a Client logs in and accesses "My Site Visits," the system retrieves all site visits assigned to that client from the database. The Client can click on a visit to view its details, including the visit date, location, and checklist sections. For checklist items marked as requiring client input, the system displays upload buttons. When the Client clicks "Upload File," they can select a file from their device. The system validates the file type and size, uploads it to storage, and records the file information in the site visit data. The checklist item status automatically updates to "submitted" once a file is uploaded. Clients can also delete files they previously uploaded if they need to replace them. This function facilitates smooth collaboration between clients and administrators, ensuring that all necessary documentation is collected before the site visit occurs.

FUNCTION: Client Participates in Site Visits
BEGIN
    Display "My Site Visits" Interface
    Get CurrentClientID
    Load AssignedSiteVisits FROM Database WHERE UserID = CurrentClientID
    
    Display SiteVisitList WITH:
        VisitDate, Location, Status
    
    WHEN "View Details" Clicked FOR SelectedVisit:
        Retrieve SiteVisitData FROM Database
        Display VisitDetails WITH:
            VisitInformation, LocationMap, Checklists
        
        FOR EACH ClientDataItem IN Checklist DO
            Display ItemName WITH UploadStatus
            
            IF ItemStatus = 'missing' OR 'pending' THEN
                Display "Upload File" Button
            END IF
            
            IF FilesExist FOR Item THEN
                Display FileList WITH DeleteOption
            END IF
        END FOR
        
        WHEN "Upload File" Clicked FOR Item:
            Select File FROM Device
            Validate FileType AND FileSize
            
            IF Valid THEN
                Upload File TO Storage
                Create FileEntry WITH:
                    Path, OriginalName, Type, UploadedBy, Timestamp
                Add FileEntry TO ClientDataChecklist
                Update ItemStatus TO 'submitted'
                Display "File uploaded successfully"
            ELSE
                Display "Invalid file type or size"
            END IF
        
        WHEN "Delete File" Clicked FOR Item:
            Display ConfirmationDialog
            IF Confirmed THEN
                Delete File FROM Storage
                Remove FileEntry FROM ClientDataChecklist
                IF NoFilesRemain THEN
                    Update ItemStatus TO 'missing'
                END IF
                Display "File deleted successfully"
            END IF
    
    Enable FilterBy Status
    Enable ViewProposal IF Available
END

Figure [X+1]. Pseudocode for Client Module That Participates in Site Visits


User Module That Submits Plant Inquiries

This module allows regular Users to submit plant inquiries for availability checks. Unlike client RFQs, user inquiries are simpler requests where users select plants they are interested in and submit an inquiry to check availability. The system sends the inquiry to administrators, who then respond with availability status and remarks for each plant. Users can view responses in their dashboard and receive email notifications when administrators reply.

Figure [X] shows the Plant Inquiry interface where Users can browse the plant catalog and select plants for their inquiry. The interface displays plant cards with photos and basic information. When logged in, users see an "Add to Inquiry" button on each plant card. After selecting plants, users can click "View Inquiry" to open a modal where they can review their selections, adjust quantities and measurements, and submit the inquiry.

[INSERT FIGURE: GUI for User Module That Submits Plant Inquiries]

The pseudocode in Figure [X+1] demonstrates how the plant inquiry submission function works. When a User browses the public plant catalog while logged in, the system displays "Add to Inquiry" buttons on plant cards. When a plant is added, the system stores it in a temporary inquiry list. The User can click "View Inquiry" to open a modal displaying all selected plants in a table format. The User can edit quantities, measurements (height, spread, spacing), or remove plants from the inquiry. When ready to submit, the User fills in their contact information (name, email, contact number) and clicks "Submit Inquiry." The system validates the input, creates an inquiry record in the database with request type set to 'user', and sends email notifications to administrators. The User receives a confirmation message and can track the inquiry status in their dashboard. When an administrator responds, the User receives an email notification and can view the response showing availability status and remarks for each plant. This function provides users with a simple way to check plant availability without the complexity of a full RFQ process.

FUNCTION: User Submits Plant Inquiry
BEGIN
    Display PlantCatalog ON PublicPage
    Initialize InquiryList AS Empty
    
    IF UserLoggedIn THEN
        Display "Add to Inquiry" Button ON PlantCards
    END IF
    
    WHEN "Add to Inquiry" Clicked FOR Plant:
        Add Plant TO InquiryList
        Update InquiryCounter
        Display "Plant added to inquiry"
    
    WHEN "View Inquiry" Clicked:
        Display InquiryModal WITH SelectedPlants
        
        FOR EACH Plant IN InquiryList DO
            Display PlantRow WITH:
                Name, Quantity, Height, Spread, Spacing
            Enable EditQuantity AND EditMeasurements
            Enable RemovePlant
        END FOR
        
        Display ContactForm WITH:
            Name, Email, ContactNumber
    
    WHEN "Submit Inquiry" Clicked:
        Get UserInput FROM ContactForm
        
        IF FormValid THEN
            Create InquiryRecord IN Database WITH:
                UserInfo, SelectedPlants
                RequestType = 'user'
                Status = 'pending'
            
            Send EmailNotification TO Admins
            Create Notification FOR Admins
            
            Clear InquiryList
            Display "Inquiry submitted successfully"
            
            IF UserHasAccount THEN
                Create Notification FOR User
                Display "Track your inquiry in your dashboard"
            END IF
        ELSE
            Display ValidationErrors
        END IF
    
    Enable RemovePlant FROM InquiryList
    Enable ClearAllPlants
END

Figure [X+1]. Pseudocode for User Module That Submits Plant Inquiries


User Module That Views Inquiry Responses

This module allows Users to view responses from administrators regarding their submitted plant inquiries. When an administrator responds to an inquiry, the system updates the inquiry status and creates a notification for the user. Users can access their dashboard to see all their inquiries and click on responded inquiries to view detailed responses including availability status and remarks for each requested plant.

Figure [X] shows the User Dashboard where Users can view their recent inquiries. The interface displays a table with inquiry ID, inquiry date, status (Pending or Responded), and action buttons. For inquiries with "Responded" status, users can click "View Response" to see the administrator's reply.

[INSERT FIGURE: GUI for User Module That Views Inquiry Responses]

The pseudocode in Figure [X+1] explains how the inquiry response viewing function works. When a User logs into their dashboard, the system retrieves all inquiries submitted by that user from the database. The inquiries are displayed in a table sorted by date, with the most recent inquiries shown first. Each inquiry shows its status using color-coded badges (yellow for pending, green for responded). When the User clicks "View Response" for a responded inquiry, the system retrieves the inquiry details including all requested plants with their availability status and administrator remarks. The system displays each plant with a color-coded availability badge: green for "Available," yellow for "Limited Stock," red for "Out of Stock," and purple for "Pre-order." The User can see the administrator's remarks for each plant, providing additional information about availability, estimated restock dates, or alternative suggestions. This function keeps users informed about their inquiry status and helps them make informed decisions about their plant purchases.

FUNCTION: User Views Inquiry Responses
BEGIN
    Display "User Dashboard" Interface
    Get CurrentUserEmail
    Load UserInquiries FROM Database WHERE Email = CurrentUserEmail
    
    Display InquiryTable WITH columns:
        InquiryID, InquiryDate, Status, Actions
    
    FOR EACH Inquiry IN InquiryTable DO
        IF Status = 'pending' THEN
            Display YellowBadge "Pending"
        ELSE IF Status = 'responded' THEN
            Display GreenBadge "Responded"
            Display "View Response" Button
        END IF
    END FOR
    
    WHEN "View Response" Clicked FOR SelectedInquiry:
        Retrieve InquiryData WITH ResponseDetails
        Display ResponsePage WITH:
            InquiryInformation (Date, RespondedBy, ResponseDate)
            RequestedPlants WITH AvailabilityStatus
        
        FOR EACH Plant IN RequestedPlants DO
            Display PlantName, Quantity, Measurements
            
            IF Availability = 'Available' THEN
                Display GreenBadge "Available"
            ELSE IF Availability = 'Limited Stock' THEN
                Display YellowBadge "Limited Stock"
            ELSE IF Availability = 'Out of Stock' THEN
                Display RedBadge "Out of Stock"
            ELSE IF Availability = 'Pre-order' THEN
                Display PurpleBadge "Pre-order"
            END IF
            
            IF RemarksExist THEN
                Display AdminRemarks
            END IF
        END FOR
        
        Display "Return to Dashboard" Button
    
    Enable SortBy Date, Status
    Enable FilterBy Status
END

Figure [X+1]. Pseudocode for User Module That Views Inquiry Responses


