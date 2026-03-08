
COMPREHENSIVE PLANT INVENTORY AND SITE VISIT MANAGEMENT SYSTEM FOR SALENGA FARM








ARIANNE FAITH S. PANES
CHARLES LOUIS C. DAVID









CAPSTONE PROJECT OUTLINE SUBMITTED TO THE FACULTY OF THE   COLLEGE   OF   COMPUTING,   ENGINEERING   AND TECHNOLOGY,  DAVAO  DEL  SUR  STATE  COLLEGE,
MATTI,   DIGOS   CITY.   IN   PARTIAL
FULFILLMENT      OF      THE
REQUIREMENTS FOR
THE DEGREE OF 



BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY





DECEMBER 2025 
APPROVAL SHEET


This Capstone Project outline entitled “COMPREHENSIVE PLANT INVENTORY AND SITE VISIT MANAGEMENT SYSTEM FOR SALENGA FARM” prepared and submitted by CHARLES LOUIS C. DAVID, ARIANNE FAITH S. PANES in partial fulfillment of the requirements for the degree of Bachelor of Science in Information Technology, is hereby accepted.


DOMINGO V. ORIGINES, JR., IT.D                  RALF MELENCION, MS
                   Member 	Member 

                Date Signed 	 Date Signed 
  
 
       KRIS C. BAHAYA, MIT                             NEL PANALIGAN, MSIT 
	     Adviser          	 Chairperson
          __________________                                __________________
  	  Date Signed 	 	 	 	        Date Signed 
  	

Accepted and approved in partial fulfillment of the requirements for the degree of the Bachelor of Science in Information Technology (BSIT).



DOMINGO V. ORIGINES, JR., IT. D
Chairperson, Computing Technology
_____________________
Date Signed



EDUARDO F. AQUINO, MSME, RPAE
Dean, Institute of Computing and Engineering Technology
_____________________	
Date Signed 
TABLES OF CONTENTS


PRELIMINARY PAGES 						        PAGES


TITLE PAGE                                                                                       i
APPROVAL SHEET                                                                              ii
TABLE OF CONTENTS  	                                   	                          iii
LIST OF FIGURES                                				                vi
LIST OF TABLES                    			   	                         viii	
LIST OF APPENDICES                            	                                    ix

CHAPTER I THE PROBLEM AND ITS BACKGROUND
Background of the Study 						       1
Objectives of the study 						       5
Scope and Limitations 						       7
Significance of the Study 						       8
Definition of Terms 							      11

CHAPTER II REVIEW OF RELATED LITERATURE AND STUDIES
Related Literature 							      13
     Literature Map of the Study 					      13
         Agricultural Technology and Digital Transformation	      15
         Digital Transformation in Agriculture			      15
         Modern Digital Plant Inventory                                        16
         Traditional Plant Documentation                                      17
         Farm Management & Inventory Systems			      17
         Biodiversity & Plant Classification				      18
         Sustainable Agriculture & Precision Farming		      19
         Digital Inventory of Crop Varieties in Local Farms	      19
Related System 							      20
     Systems Related to The Study					      21
     Concept of the Study 						      25

CHAPTER III METHODOLOGY
Research Locale 							      27
System Design 							      28
     Requirement Analysis						      31
          System Requirements 					      32
               Hardware to be used 					      32
               Software to be used 					      33
          Data Requirements 						      34
               Datasets 							      35
               Data Tables 						      35
     Design	 							      42
          Diagrams 							      43
               Use Case Diagram of the System 			      43
               Entity Relationship Diagram of the System 		      45
               Data Flow Diagram of the System 			      48
               Flowchart of the System 				      50
               Graphical User Interface of the System 		      51
               Operational Framework of the System 		      53
     Develop 								      54
          How the System will Work 					      54
          Implementation Plan 					      55
               Develop a user and role administration workspace	      56
               Develop an operations dashboard for monitoring 
                   and quick decisions					      57
               Develop an inventory management workspace 
                   for accurate records and efficient updates	      58
               Develop a site visit management interface to 
                   plan, record, and review visits			      59
               Develop a requests management interface for 
                   user and client submissions			      60
               Develop a point of sale (walk in sales) 
                   workspace for fast and accurate transactions	      61
               Develop a catalog first home page to 
                   support discovery and role based submission	      62
     Testing and Evaluation 						      63
          Testing 							      64
          Evaluation 							      65
               Respondents 						      65
               Sampling Design and Technique 			      66
               Data Gathering Procedure				      66
               Survey Instrument					      67
     Deployment Plan 						      68
          Installation Plan 						      69
          Maintenance Plan 						      69
          Back-up and Recovery Plan 				      70

REFERENCES 								      72

APPENDICES 								      77

CURRICULUM VITAE							    103
































LIST OF FIGURES


FIGURES 				TITLE					PAGE

      1		Literature Map of the Study 				      14
      2		Conceptual Framework of the Study			      26
      3		Capstone Locale of the Study				      28
      4		Agile Software Development of the Study		      30
      5		Use Case Diagram of the System				      44
      6		Entity-Relationship Diagram of the System 		      46
      7		Data Flow Diagram of the System 			      49
      8		Flowchart of the System 					      51
      9		Welcome Home Page Interface				      52
     10		Operational Framework of the System			      53
     11		User Management Interface				      56
     12		Admin Dashboard Interface				      57
     13		Inventory Management Interface				      58
     14		Site Visit Management Interface				      60
     15		Requests Management Interface				      61
     16		Point-of-sale Interface					      62
     17		Plant Catalog Interface					      63
 
LIST OF TABLES


TABLE 				TITLE					PAGE

      1		List of Systems Related to The Study			      21
      2		Hardware Requirement for System Development 	      33
      3		Software Requirement for System Development 	      33
      4		Users Table 							      35
      5		Display Plants Table						      36
      6		Plants Table Structure					      37
      7		Plant Requests Table					      38
      8		RFQ Requests Table						      39
      9		Point-in-Sale Table						      40
     10		Site Visit Table Structure					      41
     11		Scale of Measurement for functionality, reliability 
and usefulness of the system				      67










LIST OF APPENDICES


APPENDIX 				TITLES				PAGE

      1		Survey Questionnaire					      78
      2		Summary Validation Score					      91
      3		Acceptance Form						      92
      4		Validation Scores						      95
      5		Budgetary Requirements 					      98
      6		Nomination Form						      99
      7		Application for Oral Defense				    100
      8		Capstone Outline Processing Form			    101
      9		Photo Documentation					    102






 
CHAPTER I


THE PROBLEM AND ITS BACKGROUND


Introduction


Plant varieties constitute a fundamental aspect of agricultural enterprises, providing diverse product offerings, revenue streams, and competitive advantages in the marketplace (FAO, 2022). Effective management of plant variety inventories is essential for nurseries and agricultural businesses to maintain operational efficiency and meet client demands. Among the most pressing challenges are the tracking of numerous plant varieties with distinct growth cycles, managing of seasonal fluctuations in availability, and maintaining accurate stock counts necessary for informed business planning and client communication (FAO, 2022).
Recent studies have highlighted that agricultural businesses frequently encounter operational inefficiencies when relying on traditional manual inventory methods (Gołaś, 2020; Carpitella & Izquierdo, 2025). Such inefficiencies manifest as discrepancies between physical counts and recorded data, difficulties in locating specific plant varieties across multiple growing areas, and delayed responses to client inquiries regarding plant availability. Salenga Farm has experienced these challenges firsthand, as its reliance on disconnected spreadsheets and paper-based systems has introduced substantial logistical difficulties that hinder operational effectiveness. While the farm's diverse plant offerings provide a competitive advantage, manual record-keeping has led to inventory inaccuracies, inefficient stock management, and delays in fulfilling client requests. Furthermore, research demonstrates that improved inventory management efficiency is positively correlated with financial performance in the food and agricultural sectors, underscoring the importance of adopting modern inventory solutions for enterprises such as Salenga Farm (Gołaś, 2020).
The ongoing digital transformation in agriculture has been recognized as a pathway to operational sustainability and competitive advantage, with inventory management systems playing a pivotal role in enhancing transparency and efficiency throughout plant production and distribution chains (Carpitella & Izquierdo, 2025). The integration of digital technologies, such as real-time data systems, automation, and analytics, enables data-driven decision-making and ensures timely responsiveness to evolving client needs and market demands. These advancements not only streamline day-to-day operations but also support broader sustainability goals by reducing waste, optimizing resource utilization, and improving overall business performance.
In addition, implementation of point-of-sale (POS) systems in agricultural businesses and plant nurseries has further transformed transaction management and sales recording (GrazeCart, 2024). POS solutions facilitate efficient in-person sales, streamline order processing, and enable accurate, real-time tracking of inventory and revenue. Integrating inventory management with POS functionality allows for immediate stock updates, sales optimization, and improved alignment with consumer demand. Digital platforms combining POS and inventory management have become essential tools for agricultural enterprises seeking to remain competitive and responsive in a rapidly evolving marketplace.
Moreover, advancements in digital site visit and inspection systems have enhanced the capacity of agricultural businesses to collect, manage, and utilize field data effectively (Koutsos et al., 2023; Sishodia et al., 2020). Mobile and web-based tools for geotagged checklists and site assessments enable staff to conduct efficient, accurate inspections and integrate findings directly into centralized management systems. The use of geospatial technologies supports site-specific recommendations, informed resource allocation, and strategic decision-making, thereby contributing to the overall effectiveness and sustainability of farm operations.
as a well-established agricultural enterprise cultivating a diverse array of plant varieties, has recognized the limitations of its existing operational workflows. The expansion of the customer base and diversification of plant offerings have rendered manual inventory methods increasingly inadequate, resulting in inefficiencies such as resource wastage from overstocking, missed sales opportunities due to inaccurate stock counts, and labor-intensive record-keeping that detracts from more productive activities. The need for a comprehensive, scalable, and integrated management system encompassing inventory, POS, and site visit modules has become evident to support the farm's continued growth and ensure long-term operational sustainability.
In response, the development of an integrated digital management system for Salenga Farm aligns with the United Nations Sustainable Development Goals (SDGs), particularly SDG 2 (Zero Hunger), SDG 8 (Decent Work and Economic Growth), SDG 9 (Industry, Innovation, and Infrastructure), and SDG 12 (Responsible Consumption and Production). By improving inventory accuracy and reducing waste, the system contributes to more efficient resource utilization and sustainable agricultural practices. The platform supports economic growth by enhancing operational efficiency, enabling better business planning, and creating opportunities for improved client service and market competitiveness. Furthermore, the adoption of digital technologies in farm management represents a step toward modernizing agricultural infrastructure and promoting innovation in the sector. Through these contributions, the study demonstrates how digital transformation in agriculture can support broader societal goals of sustainability, economic development, and responsible resource management.

Objectives of the Study


The primary objective of the project is to develop a web-based management system for Salenga Farm to streamline plant inventory, point-of-sale transactions, site visits, and client requests. 
Specifically, it aims to:
1.	Develop a Super Admin module with the following functionalities:
1.1 Manage user accounts and assign roles;
1.2 View dashboard analytics, including:
1.2.1 Stock distribution and total plants with low stock alerts; and
1.2.2 Sales by category and overall sales records;
1.3 Browse plant inventory for the following: 
1.3.1 Filter plants by category; and
1.3.2 Search plants by name;
2. Develop an Admin module with the following functionalities:
2.1 Manage plant data and inventory for the following:
2.1.1 Create, update, and delete plant records; and
2.1.2 Maintain the plant catalog display;
2.2 Manage sales transactions for the following:
2.2.1 Record and process sales transactions; and
2.2.2 Monitor POS activities and generate receipts; 
2.3 Conduct and record site visits for the following:
2.3.1 Create, record, and review site visits with GPS mapping and assessment forms; and
2.3.2 Review client data submissions and upload proposal documents;
2.4 Manage user and client requests for the following:
2.4.1 Review and approve plant requests;
2.4.2 Send email notifications and status updates; and
	2.4.3 Generate PDF quotations;
3. Develop a User and Client module with the following 
    functionalities:
3.1 Access and browse the plant catalog;
3.2 Submit plant requests or requests for quotation;
3.3 View request status and download approved
quotations;
3.4 Collaborate on assigned site visits through document 
uploads and approvals;
4. Evaluate the system in terms of:
4.1 Functional Suitability;
4.2 Reliability; and
4.3 Usability;
4.4 Performance Efficiency; and
		4.5 Security;


Scope and Limitations


The study will develop a web-based Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm. The platform will enable authorized personnel to manage plant records, process sales with receipt generation and automatic stock updates, and administer user accounts with role-based permissions. The site visit module will provide GPS location mapping, comprehensive assessment forms (physical factors, topography, utilities, tools), and document exchange workflows in which clients can upload required documents (land titles, plans) and administrators will deliver proposals (quotations, agreements, designs). Clients will be able to approve or request changes to proposals. The request system supports user plant requests and client RFQ submissions with email notifications and PDF generation. Public users can browse the catalog, view plant details, submit requests, and download quotations.
The system will be limited to Salenga Farm's operational workflows. External integrations (payment gateways, logistics, advanced analytics), automated plant recommendations, and advanced geospatial analysis will be excluded. Data accuracy will depend on timely user input. Site visit documents will require manual admin review. System Performance may vary depending on device capabilities and connectivity.

Significance of the Study


The development of the proposed Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm will address key operational challenges faced by contemporary agricultural enterprises. The study is expected to provide valuable contributions to the agricultural sector and will hold significance for the following stakeholders:
Salenga Farm Owners and Management. The system will provide robust tools for resource allocation, inventory monitoring, sales tracking, and strategic planning. Through the integration of real-time data facilitates informed decision-making, trend analysis, and optimization of farm operations, ultimately supporting the farm's growth trajectory and long-term sustainability.
Farm Staff and Employees. Personnel will benefit from streamlined processes through automated inventory updates, simplified transaction recording, and digital site visit documentation. The system will reduces manual record-keeping tasks, minimize errors, and enable staff to focus on more productive activities such as client engagement and plant care.
Clients and Customers. Clients will benefit from improved access to comprehensive plant catalogs, simplified request and quotation processes, and transparent communication regarding order status and site visit outcomes. The system will enable faster response times to inquiries, accurate availability information, and convenient access to quotations and documentation.
Agricultural Enterprises and Nurseries. Similar agricultural businesses may use the outcome of this study as a model for modernizing their operations through digital transformation. The integrated approach to inventory management, point-of-sale transactions, and field data collection will provide methodologies and insights that can be adapted to various operational contexts.
Future Researchers and Developers. This study will serve as a key reference point for future research into agricultural management systems and digital farm technologies. The findings will contribute to the broader field by demonstrating effective integration of inventory management, POS, and site visit technologies within a single platform, guiding further improvements in optimizing these systems within agricultural settings.
Local Community and Economy. The improved operational efficiency and business performance of Salenga Farm will contribute to local economic development by supporting job creation, enhancing service quality, and promoting sustainable agricultural practices within the community.
Definition of Terms


The section provides definitions of key terms used throughout the study to facilitate a clear understanding of the concepts and functionalities discussed.
CRUD. It refers to the fundamental operations of Create, Read, Update, and Delete used for managing data within the system.
Database. It refers to an organized collection of structured information, stored electronically, that supports the efficient management of inventory, user, and transaction records.
Inventory Management. It refers to the systematic process of tracking, updating, and analyzing plant stock levels, availability, and sales transactions to ensure accurate business operations.
Point-of-Sale (POS) Module. It refers to a system feature that supports in-person sales transactions, real-time inventory updates, and integration with the overall inventory management platform.
Progressive Web Application (PWA). It refers to a web application designed to provide a responsive, app-like experience across desktop and mobile devices, with offline capabilities and enhanced performance.
Site Visit and Inspection System. It refers to a platform that enables staff to conduct digital assessments of client sites, complete checklist forms, geotag visits, and document inspection outcomes for operational and client support purposes.
User Roles. It refers to designated access levels within the system, including super admin, admin, user/client, and visitor, each with specific permissions and responsibilities.
PDF Quotation. It refers to a digital document generated by the system in Portable Document Format, providing clients with formal price quotations for plant requests.
Geotagging. It refers to the process of associating digital data, such as site visit checklists or inspection records, with specific geographic coordinates for visualization and analysis.
Email Notification. It refers to automated messages sent by the system to inform users and clients about the status of their requests or transactions.

 
CHAPTER II


REVIEW OF RELATED LITERATURE


Related Literature


The section reviews previous studies and research related to the topic. Examining these works helps identify important ideas and trends that guide the development of the Comprehensive Plant Inventory and Management System for Salenga Farm. By comparing different sources, the section provides useful background and ensures the study is based on current knowledge.

Literature Map of the Study 


Figure 1 illustrates how the reviewed literature supports the study’s framework, providing background knowledge and shaping its methodology. The following sections highlight key publications that guide the research direction. It further delineates thematic clusters and research gaps, clarifying the study’s contribution and justifying the methodological choices. It also informs the inclusion and exclusion criteria for source selection, thereby maintaining a coherent scope aligned with the study objectives. 
 
Figure 1. Literature Map of the Study






Agricultural Technology and Digital Transformation

Agriculture today is undergoing a significant transformation driven by advanced digital technologies and sustainable practices. Liu, Chen, and Tang (2022) comprehensively reviewed sustainable inventory management within Industry 4.0, highlighting how digital innovation plays a crucial role in modern agricultural systems. Efforts by Gołaś, Nowak, and Kowalski (2020) demonstrated a strong link between efficient inventory management and improved financial performance in the food and agricultural sectors, underscoring the economic imperative of adopting digital tools. Additionally, Sishodia, Ray, and Singh (2020) documented the critical use of remote sensing and geospatial technologies in precision agriculture, which enable real-time data collection and targeted decision-making that enhance productivity and resource efficiency.

Digital Transformation in Agriculture

Digital transformation in agriculture involves the integration of advanced technologies such as automation, artificial intelligence (AI), and data analytics into traditional farming practices. Pasupuleti, Thuraka, and Kodete (2024) investigated computational optimization approaches, finding that machine learning algorithms significantly improve inventory forecasting accuracy and resource allocation efficiency. Bélanger and Ben-Ayed (2023) presented an optimal control-based inventory model that minimizes excess stock while preventing shortages, demonstrating the value of AI and optimal control techniques in inventory management. Additionally, Maroof, Rana, and Kalimullah (2023) explored the adoption of e-commerce through Farm site, a web application portal designed to enhance farmers’ market access and supply chain efficiency by connecting them directly with buyers, particularly benefiting smallholder farmers.

Modern Digital Plant Inventory

Modern digital plant inventory systems leverage real-time data and advanced analytics to enhance resource management efficiency. Liu, Chen, and Tang (2022) discussed the integration of digital tracking technologies within smart farming platforms, emphasizing sustainable inventory management practices under Industry 4.0 paradigms. Gołaś, Nowak, and Kowalski (2020) highlighted the economic benefits and operational improvements achievable through adopting digital inventory practices in agricultural supply chains. Furthermore, Pasupuleti, Thuraka, and Kodete (2024) demonstrated that AI-driven solutions are critical for maintaining inventory accuracy and optimizing complex supply networks, ensuring adaptability and precision in agricultural resource management.

Traditional Plant Documentation

Traditional plant documentation remains essential in many agricultural contexts, particularly where indigenous knowledge and biodiversity conservation intersect. Caballero-Serrano, McLaren, and Carrasco (2019) examined ethnobotanical documentation methods, highlighting the critical role of traditional knowledge in sustainable plant management within Ecuadorian Amazon home gardens. Similarly, Mbuni, Wang, and Xu (2020) reviewed plant documentation practices in African agriculture, underscoring the importance of manual record-keeping and field notes in biodiversity conservation efforts. These studies emphasize that despite advances in digital records, traditional documentation practices continue to provide valuable data on plant diversity, local uses, and conservation status, often capturing knowledge not yet integrated into formal scientific databases.

Farm Management & Inventory Systems

Farm management and inventory systems are central to operational efficiency in agriculture. Ahmed, Khan, and Patel (2023) developed a multi-user plant nursery management system featuring differentiated user interfaces tailored for administrators and customers to optimize operations. Sharma, Kumar, and Singh (2024) presented a comprehensive digital solution integrating inventory management, sales tracking, and customer relationship management to streamline nursery activities. Sarker, Rose, and Van Etten (2021) examined digital inventory systems for local farms, emphasizing the importance of user-friendly design and role-based access controls to enhance usability and security in farm data management.

Biodiversity & Plant Classification

Biodiversity and plant classification studies support the accurate identification and management of plant resources. Kaya, Kaya, and Aktas (2021) analyzed plant biodiversity in agricultural landscapes, emphasizing the need for integrated classification systems that capture landscape complexity. Conciatori, Rossi, and Bianchi (2024) demonstrated the application of AI and UAV-derived imagery for high-resolution plant species classification and biodiversity estimation, showing how deep learning facilitates improved monitoring and management of plant diversity in agricultural ecosystems.


Sustainable Agriculture & Precision Farming

Sustainable agriculture and precision farming harness technological advancements to optimize resource use and promote environmental stewardship. Pande, Choudhury, and Singh (2023) reviewed precision farming techniques focusing on the incorporation of digital tools for sustainable crop management. Ray, George, and Kumar (2020) discussed how precision agriculture practices contribute to yield improvement and reduced environmental impacts, underscoring their role in climate-smart farming strategies.

Digital Inventory of Crop Varieties in Local Farms

Digital inventory systems for crop varieties enable precise tracking and management of plant genetic resources. Potgieter, Zhao, and Zarco-Tejada (2021) traced the evolution of digital crop monitoring, highlighting advances in sensor technologies and analytical approaches for crop phenology and type prediction. Van Etten, Beza, and Abdoulaye (2021) demonstrated the benefits of integrated data collection and analysis platforms in supporting crop variety management and climate adaptation at the local farm level.


Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm

The integration of sustainable inventory management with point-of-sale and site visit modules forms the foundation of the Comprehensive Plant Inventory Management System designed for Salenga Farm. Leveraging advancements in digital agriculture, the system addresses operational challenges identified in the literature and supports Salenga Farm’s goals for growth, sustainability, and improved client services. The reviewed studies collectively highlight the value of unified digital platforms for plant cataloging, inventory tracking, business transactions, and field data collection, offering a comprehensive solution tailored for modern agricultural enterprises.

Related System


The increasing adoption of digital tools, data analytics, and automation in agriculture has led to the development of a wide range of systems designed to enhance plant nursery management, inventory tracking, and site visit operations. Table 1 presents a selection of systems developed between 2020 and 2025, each addressing specific needs within the agricultural sector. These systems provide valuable insights for the design and implementation of the Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm, particularly in areas such as inventory management, user roles, and site documentation.

Table 1. List of Systems Related to The Study
Name of System	Author/
Year	Description	Strength	Weakness	Application
Nursery
Management 
System (NMS)	Sharma, Kumar, & Singh (2024)	Automates nursery operations: inventory, sales, customer management, analytics.
	Reduces manual workload, supports data-driven decisions.	Requires technical expertise for deployment.	Commercial plant nurseries.
Plant Nursery Management System	Ahmed, Khan, & Patel (2023)	Multi-user web system for plant inventory, order management, and user roles.	Enhances operational efficiency, role-based access.	Needs user training and infrastructure.	Agricultural nurseries, plant businesses.
AgriTrack Nursery Suite	Potgieter, Zhao, Zarco-Tejada, Chenu, & Zhang (2021)	AI-powered system for plant growth prediction and inventory optimization.	Predictive analytics, reduces waste.	High upfront cost for sensors and AI.	High-value nurseries, precision agriculture.
FieldSense Mobile Data Collection	Jones, Patel, & Wang (2022))	Mobile platform for site-specific crop monitoring and geotagged data collection. 	Supports accurate field data collection, ease of use.	Dependent on mobile device access and connectivity.	Field inspections, site visits, crop monitoring.
AI-Powered Plant Disease Identifier	Recent AI agriculture literature (2025)	Deep learning-based system for automatic plant disease detection and management.	Deep learning-based system for automatic plant disease detection and management.	Requires sophisticated hardware and training.	Nursery management, precision farming.
Plant Species Database Management System (PSDMS)	Lee, Kim, & Park (2021)	Database for taxonomy, distribution, conservation status, blockchain integration.	Centralizes botanical data, enhances research.	Resource-intensive maintenance.	Botanical research, conservation.
Greenhouse Inventory Software





	Acctivate, Smith, J., & Lee, H. (2023)	ERP with mobile inventory, lot traceability, automated purchase orders.	Real-time alerts, multi-tier pricing.	Requires staff training, adaptation.	Greenhouses, complex nurseries.
SmartFarm Digital Management	Liu, Zhang, & Wang (2023)	Digital twin-based farm management integrating inventory, sales, and sustainability tracking.	Enables real-time monitoring and data-driven decisions.	Requires advanced IT support to implement.	Large-scale and smart farms.
AI-Driven Inventory Control DSS	Recent research on AI in agriculture (2025)	AI-based decision support system for inventory allocation and stock optimization.	Optimizes inventory levels, reduces waste, adaptable to changes.	Optimizes inventory levels, reduces waste, adaptable to changes.	Farm inventory and supply chain management.
FarmLogs Crop Management Platform	FarmLogs (2023)	Digital platform for crop inventory, order tracking, and analytics.	Centralizes farm data, streamlines logistics.	Requires internet, training.	Farmers, agricultural producers.


The Nursery Management System (NMS) by Sharma, Kumar, and Singh (2024) exemplifies automation in nursery operations, integrating inventory tracking, sales management, customer records, and analytics to reduce manual workload and support data-driven decision-making, though it requires technical expertise for deployment. The Plant Nursery Management System by Ahmed, Khan, and Patel (2023) offers a multi-user web platform for plant inventory, order management, and user roles, enhancing operational efficiency but requiring user training and supporting infrastructure. AgriTrack Nursery Suite by Potgieter et al. (2021) introduces AI-powered plant growth prediction and inventory optimization, providing predictive analytics to reduce waste, though it demands significant investment in sensors and AI capabilities.
FieldSense Mobile Data Collection by Jones, Patel, and Wang (2022) enables site-specific crop monitoring and geotagged data collection through a mobile platform, supporting accurate field data capture but depending on device access and connectivity. The AI-Powered Plant Disease Identifier (2025) leverages deep learning for automatic plant disease detection and management, requiring advanced hardware and expertise. The Plant Species Database Management System (PSDMS) by Lee, Kim, and Park (2021) centralizes botanical data for taxonomy and conservation but involves resource-intensive maintenance. Greenhouse Inventory Software by Acctivate et al. (2023) delivers ERP features such as mobile inventory, lot traceability, and automated purchase orders, offering real-time alerts and multi-tier pricing but necessitating staff training and adaptation.
SmartFarm Digital Management by Liu, Zhang, and Wang (2023) utilizes digital twin technology for integrated farm management, inventory, and sustainability tracking, enabling real-time monitoring but requiring advanced IT support. AI-Driven Inventory Control DSS (2025) provides AI-based decision support for inventory allocation and stock optimization, adaptable to changing conditions but dependent on sophisticated infrastructure. FarmLogs Crop Management Platform (2023) centralizes crop inventory, order tracking, and analytics for farmers, streamlining logistics but requiring internet access and user training.
Collectively, these systems demonstrate the breadth of technological innovation in plant nursery and agricultural management. They offer valuable models and lessons for the design and implementation of the Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm, particularly in inventory management, user roles, and site documentation. While some systems incorporate advanced features such as AI-driven analytics or blockchain integration, the present system focuses on practical, user-centered solutions tailored to the operational needs of Salenga Farm.

Conceptual Framework of the Study


The conceptual framework serves as a structured blueprint of the proposed system, outlining the key components, their relationships, and how they collectively achieve the study’s objectives.
Figure 2 illustrates the flow starting with Online Users and Clients accessing the Salenga Farm application to browse the Plant Catalog and submit requests. The Admin manages Inventory, Dashboard analytics, POS transactions, and Site Visits, while the Super Admin handles user management and overall oversight. All modules read from and write to the Database and generate reports. This diagram highlights how information moves from user activity to administrative processing and reporting, supporting efficient management and decision-making. 

 
Figure 2. Conceptual Framework of the Study 
CHAPTER III


METHODOLOGY


Capstone Locale


The research locale for the capstone project will Salenga Farm, a specialized plant nursery and landscaping enterprise operating under the registered name "Esther's Flower Garden and Landscaping." The farm is strategically located in front of Fatima Village, Sitio MCL, Davao City, Philippines, at approximately 7.0707° N latitude and 125.6087° E longitude. Figure 3 will present a map of Salenga Farm, with a red indicator marking the precise location of the establishment within an area characterized by abundant vegetation, commercial structures, and residential dwellings.
Salenga Farm was selected as the research venue because of its extensive and diverse botanical inventory, which includes a wide range of shrubs, herbs, palms, trees, grasses, bamboo varieties, and agricultural supplements.  This diversity provides an optimal environment for the implementation and evaluation of Comprehensive Plant Inventory Management System with Point-of-Sale and Site Visit for Salenga Farm. The locale’s operational complexity and variety of plant species make it an exemplary setting for applied research, enabling the systematic collection and analysis of data to address community-specific concerns and enhance horticultural management practices.

 
Figure 3. Capstone Locale of The Study


Research Design of the System


System design establishes a structured and methodical framework for the development and implementation of the proposed solution. The framework defines architectural components, system modules, user interfaces, and data structures that will be required to meet the project's functional and non-functional requirements. The research methodology outlines the procedures and analytical techniques that will be utilized to address the study's objectives, ensuring that each phase of system development remains systematic and responsive to identified needs. 
To guide the development process, the study will adopt the Agile Software Development methodology, which emphasizes iterative and incremental progress through a series of defined phases. Agile has been widely recognized as particularly effective for web-based systems that require frequent stakeholder feedback and adaptive requirements management (Dingsøyr et al., 2012; Serrador & Pinto, 2015). Research by Campanelli and Parreiras (2015) demonstrates that Agile methodologies significantly improve project success rates in small to medium-scale web applications, making them well-suited for agricultural management systems such as the one proposed for Salenga Farm. Furthermore, studies by Misra et al. (2009) and Abrahamsson et al. (2017) highlight Agile's advantages in environments where requirements evolve based on user feedback and operational needs, which is characteristic of farm management systems that must adapt to seasonal changes and varying client demands.
The Agile cycle to be used in this study will consist of the following stages: Requirement, Design, Develop, Test, and Deploy. This approach will enable the project team to collaborate closely with stakeholders, prioritize requirements, and deliver functional increments of the system in manageable cycles.

 
Figure 4. Agile Software Development of the Study


As illustrated in Figure 4, the Agile process will begin the Requirement phase, during which functional and non-functional requirements will be gathered and prioritized in consultation with Salenga Farm stakeholders. The Design phase will be focus on creating system architecture, database schemas, and user interface mockups. During the Develop phase, system modules and features will be implemented incrementally, with each iteration producing working software that can be demonstrated to users. Testing phase will involve rigorous quality assurance activities, including functional testing, usability testing, and security validation, to ensure that each increment meets defined acceptance criteria. Finally, Deploy phase will mark the release of validated increments for operational use, with continuous monitoring and feedback collection to inform subsequent iterations.
The Agile methodology offers significant advantages for agricultural inventory and site visit management systems because of its emphasis on continuous feedback cycles, rapid adaptation to changing requirements, and incremental delivery of value (Highsmith & Cockburn, 2001). This iterative approach is expected to be especially valuable in environments where operational requirements evolve in response to seasonal factors, variable client demand patterns, and emerging business needs. Through structured, cyclical development, the system will be able to adapt to changing requirements while maintaining alignment with core business processes at Salenga Farm, ultimately ensuring that the delivered solution effectively addresses real-world operational challenges.

Requirement


In this stage, the researcher will perform the following tasks: (1) formulating specific objectives derived from the desired web-based Salenga Farm Plant Inventory and Site Visit Management System; (2) conduct data gathering to capture catalog attributes, role‑determined request workflows, and operational policies; and (3) identifying development strategies and selecting tools appropriate for a Laravel‑based web application.

System Requirements

System requirements define the essential technical specifications necessary for the development and implementation of the proposed solution. Requirements encompass hardware, software, and other resources needed to effectively create and deploy the system. A comprehensive understanding of the required software, hardware, and related parameters ensures that all resources are accessible and applicable to the intended purpose of the inventory management platform.
 	Hardware to be used. Hardware requirements specify the minimum components necessary for an electronic device to support the selected software and perform required tasks. Processor speed, memory, and other components are detailed to ensure efficient and error-free operation. Meeting the specified hardware requirements is essential for maintaining optimal performance and consistent results.
The hardware presented in Table 2 is sufficient for developing a web- based  plant  inventory   management  system  while  ensuring  an 
an efficient workflow during the development process.

Table 2. Hardware Requirement for System Development
Hardware	Specification
 
Laptop	• Intel Core i5-3317U CPU @ 1.70GHz
• 8.00 GB RAM


	Software to be used. Software requirements define the functionalities, performance criteria, and characteristics essential for system development. Table 3 presents an overview of the software tools and technologies selected to meet the objectives of the project.
 
Table 3. Software Requirement for System Development
Software		Specification
Operating Software	Windows 10	 
Backend Software	MySQL	 
Integrated Development Environment (IDE)	Visual Studio Code	 
PHP Framework	Laravel 11	 
Dependency Management	Composer 2.7.6	 
API Testing	Postman	 
Package Management	Node Package Manager (npm)	 
The Selection of software influences project outcomes through technical capabilities and functional parameters. The development environment will utilize Windows 10 as the operating system and Visual Studio Code as the integrated development environment. Application architecture will employ Laravel 11 for backend operations, with Composer managing dependencies. 
Frontend development will incorporate ReactJS libraries for user interfaces, with npm handling package management. MySQL will serve as the database management system, and Postman will be used for API testing. The chosen technology stack will enable efficient development of plant inventory tracking and client request processing within a secure, scalable architecture that aligns with project objectives and developer competencies.

Data Used
Data Used refers to the specific details and characteristics of the data utilized to support the project. It describes the types of data involved and explains how the data is collected, stored, processed, and managed to achieve the objectives of the system.
 Datasets of the Project. Datasets were groups of organized collections of data used for analysis and interpretation in applications such as inventory management, client request processing, and business analytics. Structured and reliable datasets are essential for supporting accurate system operations and informed decision-making. Within the context of the web-based plant inventory management system, datasets provide comprehensive information about users, plants, client interactions, and business transactions.
Data Tables. Data tables organize information through columns and rows with clear headings. Each table below outlines the structure of a key dataset in the system. Table 4 presents the System Users Table, which stores essential account and role information for all individuals who access the platform. This table is crucial for managing user authentication, personal and contact details, and role-based permissions. By organizing user data in this way, the system can securely control access and ensure that each user interacts with the platform according to their assigned role. 

Table 4. Users Table
Column Name	Constraint	Data Type
id	Primary Key	Int
first_name	Not Null	Varchar
last_name	Not Null	Varchar
email	Not Null, Unique	Varchar
password	Not Null	Varchar
contact_number	Not Null	Varchar
company_name	Not Null	Varchar
role	Not Null	Varchar
avatar           	Optional	Varchar
created_at	Default	Timestamp
updated_at	Default	Timestamp
email_verified_at	Optional	Timestamp
remember_token	Optional	Varchar
is_client	Not Null	Boolean


Table 5 presents the Display Plants Table, which functions as the catalog for all plants shown to clients and visitors. This table contains key information such as plant names, descriptions, categories, and images, ensuring that only accurate and approved plant details are visible in the public catalog. It supports efficient plant management and helps users browse and find plants within the system.  

Table 5. Display Plants Table
Column Name	Constraint	Data Type
id	Primary Key	Int
name	Not Null	Varchar
code	Optional	Varchar
scientific_name	Optional	Varchar
description	Optional	Text
category       	Not Null	Varchar
height_mm	Optional	Int
spread_mm	Optional	Int
spacing_mm	Optional	Int
photo_path	Optional	Varchar
created_at	Default     	Timestamp
updated_at	Default	Timestamp


Table 6 presents the structure of the Plants Inventory Table, which serves as the central record for all plant stock managed by the system. This table supports inventory control and business operations by storing detailed information about each plant, including its name, scientific classification, physical characteristics, pricing, and available quantity. By maintaining accurate and up-to-date inventory data, the table enables efficient monitoring of stock levels and supports sales, ordering, and reporting functions within the platform. 
 
Table 6. Plants Table Structure
Column	Constraint	Data Type
Id	Primary Key	Int
 name	Not Null	Varchar
code	Optional	Varchar
scientific_name	Optional	Varchar
description	Optional	Text
category	Not Null	Varchar
height_mm	Optional	Int
spread_mm	Optional	Int
spacing_mm	Optional	Int
oc	Optional	Varchar
price	Not Null	Decimal(10,2)
cost_per_sqm	Not Null	Int
pieces_per_sqm	Not Null	Decimal(10,2)
quantity	Not Null	Int
photo_path	Optional	Varchar
created_at	Default	Timestamp
updated_at	Default	Timestamp


Table 7 presents the structure of the Plant Requests Table, which is used to track all client inquiries regarding plant orders from submission through fulfillment. This table stores essential details such as the client’s contact information, request and due dates, requested items in JSON format, current status, and the path to any generated PDF documents. By organizing these details, the table enables efficient monitoring and management of client requests, supporting timely responses and accurate fulfillment within the system. 

Table 7. Plant Requests Table
 Column      	 Constraint  	 Data Type
id          	 Primary Key 	 Int      
email       	 Not Null    	 Varchar  
name        	 Optional    	 Varchar  
request_date	 Not Null    	 DateTime 
due_date    	 Not Null    	 DateTime 
items_json  	 Not Null    	 JSON     
status      	 Enum        	 Varchar  
pdf_path    	 Optional    	 Varchar  
created_at  	 Default     	 Timestamp
updated_at  	 Default     	 Timestamp

Table 8 presents the structure of the RFQ Requests Table, which manages formal client quotation requests within the system. This table records essential information such as the unique RFQ number, client and company details, contact information, delivery address, the list of requested plants, status, and any additional notes. By maintaining comprehensive tracking and fulfillment data, the table supports efficient processing and monitoring of client quotations from initial request through to resolution.  

Table 8. RFQ Requests Table
Column         	 Constraint       	 Data Type
 id             	 Primary Key      	 Int      
 rfq_number     	 Unique, Not Null 	 Varchar  
client_name    	 Not Null         	 Varchar  
 client_email   	 Not Null         	 Varchar  
 company_name   	 Optional         	 Varchar  
 contact_number 	 Optional         	 Varchar  
 delivery_address	 Optional        	 Text     
 requested_plants	 Not Null        	 JSON     
 status         	 Enum             	 Varchar  
 notes          	 Optional         	 Text     
 created_at     	 Default          	 Timestamp
 updated_at     	 Default          	 Timestamp


Table 9 presents the structure of the Point-of-Sale Table, which records all in-person sales transactions conducted within the system. This table captures detailed information for each sale, including the transaction date, total amount, product details, payment method, and customer information. It also links each transaction to the staff member who processed the sale. By organizing sales data in such way, the table supports accurate tracking, reporting, and analysis of business operations.

Table 9. Point-in-Sale Table
Column         	 Constraint             	 Data Type     
id             	 Primary Key            	 Int           
transaction_date	 Not Null              	 DateTime      
total_amount   	 Not Null               	 Decimal (10,2) 
items_json     	 Not Null               	 JSON          
payment_method 	 Not Null               	 Varchar       
customer_name  	 Optional               	 Varchar       
processed_by   	 Foreign Key (users.id) 	 Int           
created_at     	 Default                	 Timestamp     
updated_at     	 Default                	 Timestamp     


The database structure supports the complete workflow from plant inventory management to client request fulfillment. Relationships between tables enable efficient data retrieval and reporting for operational needs, while providing a clear separation between public-facing catalog data and internal inventory management.
Table 10 outlines the structure of the Site Visit Table, which stores all relevant information about each inspection, including geolocation, detailed checklist results, inspector details, and supporting documentation. All checklist data related to the inspection such as scope of work, climate factors, topography, and other site-specific assessments are stored as JSON fields within the same table, allowing for flexible and comprehensive documentation of each site visit.

Table 10. Site Visit Table Structure
Column	Constraint	Data Type
id	Primary Key	Int
latitude	Not Null	Decimal(9,6)
longitude	Not Null	Decimal(9,6)
location_address	Optional	Varchar
client	Not Null	Varchar
contact_number	Not Null	Varchar
email	Not Null	Varchar
job_no	Optional	Varchar
progress_code
	Optional
	Varchar
project_no	Optional	Varchar
location	Not Null	Varchar
landscape_area	Optional	Varchar
site_inspector	Not Null	Varchar
visit_date	Not Null	Date
checklist_json	Optional	JSON
status	Default; pending	Varchar/Enums
notes	Optional	Varchar
created_at	Default	Timestamp
updated_at	Default	Timestamp

The site visit dataset enables systematic documentation and analysis of inspection activities, supporting both operational oversight and data-driven recommendations for landscaping and plant placement. Integration of geolocation and checklist data facilitates visualization of site visits on a map and enhances the ability to track inspection outcomes over time.

Design


The second phase of the Agile Software Development process is the Design, during which the project team translates gathered requirements into a comprehensive architectural blueprint for the system. This phase begins with the creation of a detailed system outline that defines how the solution will be structured to meet Salenga Farm’s operational needs and user expectations.
During the Design phase, key architectural components are defined, including the organization of system modules, user interfaces, and data structures. Essential design artifacts are developed at the stage, such as use case diagrams, entity-relationship diagrams, data flow diagrams, flowcharts, and graphical user interfaces. These design elements provide a clear visualization of system functionality, data flows, and user interactions.
The following sections present the designs and architectural components that support the inventory management, site visit, and business operations modules. This collaborative and iterative design process ensures that the system architecture remains flexible and adaptable, supporting ongoing refinement as new requirements or improvements are identified throughout the Agile development cycles.

Diagrams

Diagrams serve as visual representations that illustrate information, relationships, and interactions among elements within the system. Shapes, lines, symbols, and text are used to depict various entities and their connections. Such diagrams provide an overview of the system’s structure, facilitate identification of potential issues, and support improvements in overall functionality.
 	Use-Case Diagram. A use-case diagram is a visual modeling tool that represents the functional requirements of a system and the interactions between users (actors) and the system. It outlines specific actions or services (use cases) that the system performs in response to user inputs. This diagram helps stakeholders understand user-system interactions, identify system boundaries and user roles, and serves as a foundational reference during design and development. The figure below illustrates the use-case diagram for the proposed system.
 
Figure 5. Use Case Diagram of the System


As shown in Figure 5, the system features four primary actors: Online User, Client, Admin, and Super Admin. Online Users can (1) log in to the system, (2) browse the plant catalog to view available plants and their descriptions, (3) submit plant requests, and (4) receive email notifications regarding their requests. Clients, as registered users, can (1) submit plant requests and RFQ forms to the admin, (2) view the status of their requests, (3) receive email updates, and (4) access all features available to Online Users. Admins are responsible for managing the core system functions, including: (1) managing plant inventory by adding, editing, or deleting plant records, (2) handling and processing requests from users and clients, (3) sending email notifications and updates, (4) conducting site visits and filling out digital checklists, (5) viewing site visit maps and statistics, and (6) generating and accessing system dashboards and reports. Super Admin are responsible in (1) managing user accounts by adding, editing, or deleting users. Both Admin and Super Admin roles ensure the smooth operation of the system, from inventory management and request processing to site inspection and reporting.
Entity Relationship Diagram (ERD). An Entity Relationship Diagram (ERD) depicts the database structure by outlining entities (tables), their attributes, and the relationships among them (one to one, one to many, many to many). It supports efficient and consistent data design by clarifying how data elements connect and how the model serves system functionality. The ERD provides a concise, shared view for developers, analysts, and stakeholders to refine and implement the database accurately. The figure below presents the ERD for the proposed system.

 
Figure 6. Entity-Relationship Diagram of the System

Figure 6 will illustrate the entity-relationship diagram of the system. As shown in the figure, there will be twelve (12) entities represented: users, system logs, inventory logs, plant categories, plants, display plants, plant request, request details, sales, payment records, site visits, and RFQ requests.	
A user will be able to create multiple plant requests, record many sales, conduct site visits, and submit RFQ requests in the system. The plants entity will serve as a central component, connecting to several tables including plant categories, display plants, inventory logs, request details, and sales. Each plant will be assigned to one plant category, while display plants will represent the public catalog view of available plants in inventory.
Sales records will capture transaction details and are linked to payment records for financial tracking. Plant requests to be submitted by users will contain multiple request details, each referencing specific plants. The site visits entity will record inspection activities to be conducted by users, storing geolocation, client, and visit information along with digital checklists. The RFQ requests entity will manage client requests for quotations, capturing client information and requested plant details. System logs and inventory logs will track important system activities and changes in plant quantities. Every entity in the diagram will be connected to at least one other entity, forming a comprehensive network that will support all major inventory, request, sales, site visit, and quotation management operations within the system.
 	Data Flow Diagram (DFD). A data flow diagram will depict the flow of data across the system. It will demonstrate the transformation and storing of data by many system components, making it a useful instrument for examining and constructing systems. It also helps identify how information moves between users, processes, and data stores within the system. By visualizing these interactions, developers gain a clearer understanding of system requirements and potential problem areas. A DFD provides a structured way to break down complex processes into simpler, more manageable parts. It also supports better communication among stakeholders by offering a visual representation of system operations. Ultimately, a DFD ensures that the system design is accurate, efficient, and aligned with user needs.
The figure 7 will show the data flow diagram of the system. The diagram will outline the primary external entities, system processes, and data stores, as well as the flow of information between them. In the current system, visitors and clients will be able to browse the plant catalog, with clients able to submit specific plant requests and view site visit results. Registration and authentication will be required for clients, staff, and administrators to access additional features. 

 
Figure 7. Data Flow Diagram of the System


The super admin can only manage users while viewing plant inventory data, point-of-sale (POS), site visits, and requests. Admin and staff will manage inventory, process sales, conduct site visits, handle client requests, and generate reports, but will have not have access to user management. Each process will interact with its corresponding data store: user management will access the user database, inventory management will update the plant database, POS transactions will be recorded in the sales database, site visit results will be stored in the site visit records, and client requests will be logged in the client requests database. 
The reporting module will aggregate data from all relevant sources to provide comprehensive statistics and insights. This DFD will ensure that data flows securely and efficiently between users, processes, and data stores, supporting the system’s objectives of accurate inventory tracking, streamlined sales, effective site visit management, and responsive client service. The clear separation of roles and modules will enhance both security and usability, with the admin retaining the highest level of system privilege.
Flowchart. A flowchart will be a diagram that shows the sequence of processes and decision points in a system, used in software development and project management to communicate complex workflows clearly and concisely.

 
Figure 8. Flowchart of the System


 	Graphical User Interface (GUI). The graphical user interface (GUI) will provide a clear and consistent entry point to the system. It follows a catalog first design and will use readable typography, high contrast elements, and responsive layouts suitable for desktop and mobile. Full page interfaces will be presented in the Implementation Plan; this section it will present the Welcome Home Page as the entry screen for users.

 
Figure 9. Welcome Home Page Interface


The Figure 9 will show Welcome Home Page The welcome screen will present a centered hero banner with the title “Welcome to Salenga Farm,” a brief subtitle introducing the catalog, and a prominent “Explore Plants” call to action. A soft, blurred plant background will draw focus to the banner and guides the user toward the catalog. Selecting “Explore Plants” will lead directly to the Plant Catalog, from which standard users will proceed to a Normal Plant Request and client accounts will proceed to a Request for Quotation (RFQ). The layout will maintain clarity, contrast, and
responsiveness across device sizes.

Operational Framework

An operational framework is a structured plan that outlines how a project or organization will achieve its goals through defined processes, resources, and coordinated activities. It guides implementation, daily operations, and performance evaluation to ensure all stakeholders work efficiently together. By clarifying responsibilities, workflows, timelines, and quality standards, it reduces risks, promotes accountability, and enhances the overall effectiveness and sustainability of the initiative.

 
Figure 10. Operational Framework of the System


Figure 10 will illustrate the operational framework to be applied in
the study. The framework will be essential for the project as it defines the fundamental concepts and procedures involved in the system development.

Develop

During this phase, the approved screens and workflows will guide implementation. The team will build the Laravel web application with a responsive layout, clear validation, and consistent feedback so users will be able access accounts, browse the Plant Catalog, and submit requests with minimal steps on both desktop and mobile.

How the System Will Work
This section will provide a broad overview of the Salenga Farm system to be developed in this study. A concise summary of the principal features and workflow to be included in the platform is presented below.
The system will operate through four distinct user roles, each with specific responsibilities and access levels. The Super Admin will oversee the entire system, managing user accounts, assigning roles, designating client status, and monitoring system logs for security and maintenance. The dashboard will provide comprehensive analytics including stock distribution, low stock alerts, and sales performance, while maintaining read-only access to operational modules to preserve governance and separation of duties.
The Admin workspace will serve as the operational center for daily business activities. Administrators will manage the complete plant inventory through create, update, and delete operations with photo uploads, maintaining both internal records and the public catalog display. The point-of-sale module will process walk-in sales transactions with automatic inventory deduction and receipt generation. Site visit management will enable scheduling visits with GPS mapping, completing assessment forms, uploading proposal documents, and reviewing client submissions. The inquiry and request management system will allow administrators to review user inquiries and client RFQ submissions, set availability status and remarks for requested plants, send responses with email notifications, and generate PDF quotations.
Client accounts will function as enhanced business users with access to a dedicated Request for Quotation (RFQ) system. Clients will browse the catalog, select multiple plants with detailed specifications, submit formal RFQ requests, and download approved quotations. Site visit collaboration will enable clients to upload required documents, mark checklist items complete, and approve or request changes to administrator proposals. The personal dashboard will display request history, inquiry responses with availability status, and notification updates.
Regular users will access the plant catalog to browse available plants with search and filtering capabilities. Users will select plants by clicking "Add to Inquiry" on plant cards and submit inquiries through a modal interface with editable quantities and measurements. After submission, users will receive email confirmations and track inquiry status through their dashboard. When administrators respond, users will receive notifications and view detailed responses showing availability status and admin remarks for each requested plant. The plant care library will provide access to care guides and maintenance instructions. Public visitors without accounts will browse the catalog in view-only mode but must register to submit inquiries.
Activity across all user roles and system modules will support comprehensive analytics and reporting. Real-time data on stock levels, sales performance, inquiry response rates, and site visit completion will provide actionable insights for inventory planning, business forecasting, and continuous operational improvement.

Implementation Plan 
The implementation plan will explain the steps, resources, and screens needed to deploy the Salenga Farm web system on time and within budget. The system will include three main modules: (1) Super Admin, for user and role administration with system wide viewing and search; (2) Admin, for plant data and inventory, sales/point of sale (POS), site visits, and request processing; and (3) User/Client, for catalog browsing, role based submissions, status tracking, and downloading approved quotations. The sections below will present the developed interfaces in a formal and organized manner.
 	Develop a user and role administration workspace. Provide a table to view accounts, edit user details, and assign or revoke roles (including client status). Add system wide search to locate records quickly. Keep operational pages in read only mode for the Super Admin to preserve governance and separation of duties.

 
Figure 11. User Management Interface


Figure 11 will show the Super Admin screen for managing user accounts. It will list users with role badges and actions to create, edit, or delete accounts, and to assign or remove roles. Super Admin accounts will be hidden from change to protect security and accountability. The table will display essential user information including first name, last name, and assigned role with clear visual indicators. This centralized user management will ensure proper access control and maintain the integrity of role-based permissions across the platform.
 	Develop an operations dashboard for monitoring and quick decisions. Show summary cards, low stock alerts, and charts for stock distribution and sales by category. Include a recent plants panel and quick stock update controls. Keep a left sidebar for consistent navigation to other pages.

 
Figure 12. Admin Dashboard Interface

Figure 12 will display summary cards (including low-stock alerts), a
stock distribution pie chart, a sales-by-category bar chart, a recent plants list, and quick update controls. Color-coded indicators support fast review, with the Super Admin accessing all analytics. Tabbed navigation allows switching between stock and sales charts. The Quick Actions panel includes an "Update Stock" button that opens a modal with filters and search for efficient bulk updates.
 	Develop an inventory management workspace for accurate records and efficient updates. Use a searchable and filterable table with category icons to help scanning. Show key plant attributes per row and provide actions to add, edit, and delete records. Support bulk selection to speed up batch updates.

 
Figure 13. Inventory Management Interface


Figure 13 will show a table of plant records with search, category filters (e.g., shrub, herb, palm, tree, grass, bamboo, fertilizer), and row actions. Each row will display name, code, scientific name, availability, and size or spacing. Bulk operations will help keep the catalog current at scale. The interface includes expandable detail rows that will reveal comprehensive plant information including measurements, cost information, and stock details when users click the chevron icon.
 	Develop a site visit management interface to plan, record, and review visits. Combine an interactive map for location pins with a list of visits and their status. Allow staff to add a visit, fill out a structured form, and link the record to the mapped location. Provide quick access to past visits for follow up. Include filters (e.g., date, status, client) and keyword search to retrieve records efficiently, with support for attaching photos or documents to each visit for documentation. Ensure required fields are validated and display clear confirmations after saving or updating entries.
Figure 14 will integrate OpenStreetMap with a visit list, allowing staff to schedule visits, pin client locations, and complete a digital form linked to each map entry. The list will display the visit date, client or location, and status to support planning and documentation.
 
Figure 14. Site Visit Management Interface


	Develop a requests management interface for user and client submissions. Separate tabs and counters for Client Requests and User Requests. Include a table showing requester details, dates, status, item counts, and pricing options. Provide actions to view details, send quotations or status emails, download PDFs, and delete records. Add filters and keyword search, with role-based permissions controlling which actions are available. Show status history, validation feedback, confirmation messages, and log all email/quotation events for auditing.
Figure 15 will present tabs for Client and User requests, a table of key details, and actions for sending quotations or notifications and downloading PDFs. Status indicators show progress at a glance.

 
Figure 15. Requests Management Interface


	Develop a point of sale (walk in sales) workspace for fast and accurate transactions. Provide a cart with line item controls, product search, and real time totals. Add a process sale action that will generate a receipt and updates inventory automatically. Include a sales history view with filters for routine checks. Support multiple payment methods, discounts/taxes, and receipt printing or email, with clear validation and confirmation messages after each transaction. Provide end of day reconciliation with export (CSV/PDF) and maintain an audit log of sales adjustments and voids for accountability.
Figure 16 will display the POS screen with cart items, totals, and a process button that generates a receipt and updates stock. A history panel with date filters will support review and reconciliation.
 
Figure 16. Point-of-sale Interface


Develop a catalog first home page to support discovery and role based submission. Present plant cards with images, key attributes, and availability indicators, with fast search and filters. Standard users can submit a Normal Plant Request, while clients can submit a Request for Quotation (RFQ), each ending with confirmation and downloadable documents when approved. Ensure a responsive layout, pagination or lazy loading, retained filters, and accessible labels with keyboard navigation. Provide clear feedback and error handling when initiating requests.
Figure 17 will display searchable and filterable plant listings with images, attributes, and availability indicators. The catalog will serve as the starting point for role based submissions, Normal Plant Request for users and RFQ for client accounts, supporting a direct and clear process from browsing to confirmation.

 
Figure 17. Plant Catalog Interface


Testing and Evaluation


The fourth stage of the system development is testing. The proposed design is carefully examined to ensure alignment with the study's objectives, with multiple test iterations conducted to surface and address potential issues. End users participate in testing according to their roles in the system so that feedback reflects real operational contexts. Testing encompasses both functional verification to confirm that features operate as specified and non-functional assessment to evaluate performance, security, and usability characteristics. This comprehensive approach ensures that the system meets technical requirements while remaining practical and accessible for its intended users.

Testing 

Testing will be essential to verify proper operation and conformance with defined parameters for a web-based catalog-first platform. It aims to identify defects while confirming intended functions such as Plant Catalog rendering, search and filtering accuracy, plant detail presentation, and the completion of role‑determined submission paths (Normal Plant Request for standard users and Request for Quotation for client accounts), including confirmations and PDF generation where applicable. 
The test program will also include cross‑browser and device responsiveness checks, performance measurements for page load and search responsiveness, and security reviews focused on access control to role‑specific actions, CSRF protections, session handling, and basic rate‑limit behavior. The system will be tested and evaluated by an academic panel and IT experts from the partner institution, together with designated Salenga Farm administrative staff, managerial personnel, and selected client representatives. Through these activities—encompassing both functional and non‑functional tests—potential issues will be identified and resolved prior to deployment to ensure reliable operation in the target environment.

Evaluation

In this phase, the system will be evaluated against ISO/IEC 9126 quality characteristics, with emphasis on functionality, reliability, usability, and efficiency. Functionality evaluation will determine whether the platform fulfills the defined objectives—accurate catalog presentation, effective search and retrieval, and successful completion of role‑appropriate submissions with clear confirmations. Reliability evaluation will assess the capability of the system to operate continuously and consistently over a defined period, with minimal errors or downtime and resilient handling of failures. Usability evaluation will consider clarity of labels and messages, ease of navigation, consistency of layouts, accessibility across screen sizes, and the effectiveness of search and retrieval in supporting user tasks. Efficiency evaluation will examine resource utilization and response times during common interactions, including catalog filtering and submission processing. Findings from these evaluations will guide targeted refinements to improve the system’s fitness for purpose prior to official release.
 	Respondents. Respondents  are  individuals or groups  who
will participate in a surveys, evaluations, or provide information for project implementation. As the system will be installed in Salenga Farm, the respondents will be the Salenga Farm administrators (Super Admin and Admin) and purposively selected IT faculty. The combined feedback from operational administrators and expert reviewers will help further improve the Comprehensive Plant Inventory and Site Visit Management System.
 	Sampling Design and Technique. Sampling and design technique refers to the method used in gathering and analyzing the data in the study. The researchers used purposive sampling. In this study, respondents are not randomly selected but are chosen based on their role expertise and relevance to the research: Salenga Farm administrators as operational users, and IT faculty as expert evaluators.
 	Data Gathering Procedure. Data gathering is the process of acquiring information on the topic of the study and its specific goal. The procedure will be critical for both conducting the research and correctly assessing the acquired data samples that are collected using survey questionnaires. For the Salenga Farm Inventory Management System, survey responses will be used to evaluate the system's performance in managing plant inventory, catalog display, and request processing.

Survey Instrument

The survey instrument to be used in the study will be a paper-based survey medium. The paper-based survey is a traditional method wherein printed survey questionnaires will be distributed to the respondents. The questionnaire will assess respondents' level of agreement in each of the five areas using a 5-likert psychometric rating scale. 
There will be five (5) categories: very good, good, fair, poor, and very poor. The degree of agreement used for statistical analysis in obtaining the verbal description will be graded using the matrix below.

Table 11. Scale of Measurement for functionality, reliability and 
                 usefulness of the system
 Mean Range 	 Descriptive Equivalent 	 Interpretation 
  4.51-5.00 	 Very Good (VG) 	The measure described in the item is highly observable 
 3.51-4.50 	 Good (G) 	The measure described in the item is observable 
 2.51-3.50 	 Fair (F) 	The measure described in the item is not so observable 
  1.51-2.50 	 Poor (P) 	The measure described in the item is not observable 
 1.00-1.50 	 Very Poor (VP) 	The measure described in the item has no security protocol 


 	Statistical Tools. In the study, the responses to the questionnaire and evaluation were consolidated and tabulated. In analyzing and interpreting of the data, the values were summarized through the summation of all scores given by the evaluators and divided by the total number of evaluators. The weighted mean was used to describe the impact of the system on the evaluators as calculated using the expression. Equation formula for getting the mean value:
 
The mean is employed to determine the extent of functionality, reliability and acceptability of the web application for the Salenga Farm Inventory Management System. Results inform subsequent system refinements and validate deployment readiness for operational implementation.

Deployment Plan


To guarantee the Salenga Farm system’s efficacy, deployment planning is essential. In this stage, the system is set up, tested, and users are introduced. Three primary processes are the emphasis of the deployment: (1) system installation, (2) data backup, and (3) continuous maintenance. A well-organized deployment plan guarantees minimal operational disturbance, cost-effectiveness, and timely implementation.

Installation Plan

 The installation plan will serve as a step-by-step guide for properly setting up and deploying the proposed Salenga Farm Plant Inventory and Site Visit Management System. It will outline the procedure to ensure that the System is successfully installed and configured in the target enviro.
Step 1: Prepare the server and application environment. Configure the domain and HTTPS; upload the source code; set environment variables (.env); run Composer installation; generate the application key; link storage; and execute database migrations and seeders (including baseline roles and client designation where applicable).
Step 2: Verify operation in the target environment. Confirm that the Plant Catalog, Normal Plant Request (user), and RFQ (client) functions operate as expected, and that administrative pages, email notifications, logs, and scheduled tasks function correctly.

Maintenance Plan

 A maintenance plan will provide a structured framework for ensuring
a simple set of steps and schedules made to keep a system working well. Its main goal is to avoid problems and keep everything running smoothly. This plan includes fixing issues, preventing problems before they happen, and resolving any errors that come up.
Step 1: Regularly check and update the software and supporting tools to keep everything current and secure.
Step 2: Monitor how the system is performing to spot and fix issues that may affect responsiveness or reliability.
Step 3: Establish a regular time to back up data so nothing important is lost if a failure occurs.
Step 4: Keep a clear record of all changes and updates to support troubleshooting and accountability.

Backup and Recovery Plan

This strategy outlines simple and important steps to protect and restore data if something unexpected happens like a system crash, data corruption, or a security issue. Here is how the Salenga Farm system handles backup and recovery:
Step 1: Assign a staff member to oversee scheduled backups and verify completion, ensuring no important data is missed.
Step 2: Check backup files regularly to ensure they are complete and restorable.
Step 3: Keep copies of the application and configuration to enable faster restoration.
Step 4: Maintain a concise recovery guide that explains actions in case of failure or data loss.
Step 5: Test the recovery guide periodically and update it as needed to keep it effective.
 
REFERENCES


Abrahamsson, P., Salo, O., Ronkainen, J., & Warsta, J. (2017). Agile software development methods: Review and analysis. VTT Publications,     478,      3-107  .    https://www.vtt.fi/inf/pdf/
publications/2002/P478.pdf

Acctivate. (2023). Greenhouse inventory software [Software]. Acctivate. https://www.acctivate.com/greenhouse-inventory-software

AgTech Solutions. (2023). AgriTrack nursery suite: AI-powered plant growth prediction [Software]. https://www.agtechsolutions. com/agritrack

Ahmed, S., Khan, M., & Patel, R. (2023). Development of plant nursery management system. International Research Journal of Modernization in Engineering Technology and Science (IRJMETS), 7(3), 15–22. https://doi.org/10.56726/IRJME TS70484

Bélanger, M., & Ben-Ayed, O. (2023). Inventory management through one step ahead optimal control based on linear programming. RAIRO - Operations Research, 57(1), 55-73. https://doi.org/1 0.1051/ro/2023003

Caballero-Serrano, V., McLaren, B., Carrasco, J. C., Alday, J. G., Fiallos, L., Amigo, J., & Onaindia, M. (2019). Traditional ecological knowledge and medicinal plant diversity in Ecuadorian Amazon home gardens. Global Ecology and Conservation, 17, e00524. https://doi.org/10.1016/j.gecco.2019.e00524

Campanelli, A. S., & Parreiras, F. S. (2015). Agile methods tailoring–A systematic literature review. Journal of Systems and Software, 110, 85-100. https://doi.org/10.1016/j.jss.2015.08.035

Conciatori, M., Rossi, F., & Bianchi, L. (2024). Plant species classification and biodiversity estimation from UAV images with deep learning. Remote Sensing, 16(19), 3654. https://doi.org /10.3390/rs16193654

Dingsøyr, T., Nerur, S., Balijepally, V., & Moe, N. B. (2012). A decade of agile methodologies: Towards explaining agile software development. Journal of Systems and Software, 85(6), 1213-1221. https://doi.org/10.1016/j.jss.2012.02.033

FarmerP. (2024). Unlocking the green revolution: How plant nursery management software is revolutionising agriculture. FarmERP. https://www.farmerp.com/archives/unlocking-the-green-revolution-how-plant-nursery-management-software-is-revolutionising-agriculture

FarmLogs. (2023). FarmLogs crop management platform [Software]. FarmLogs. https://www.farmlogs.com/

Gołaś, Z., Nowak, B., & Kowalski, P. (2020). Inventory optimization of fresh agricultural products supply chain based on agricultural superdocking. Journal of Applied Mathematics, 2020, Article ID 2724164. https://doi.org/10.1155/2020/2724164

Gupta, A., & Singh, R. (2024). Machine learning framework for early detection of crop disease. International Journal of Finance and Management Research, 3(2024). https://www.ijfmr.com /papers/2024/3/20240.pdf

Highsmith, J., & Cockburn, A. (2001). Agile software development: The business of innovation. Computer, 34(9), 120-127. https://doi.org/10.1109/2.947100

IJIREEICE. (2025). A web portal for plant nursery management. International Journal of Innovative Research in Electrical, Electronics, Instrumentation and Control Engineering. https: //ijireeice.com/wp-content/uploads/2025/04/IJIREEICE.202 5.13447.pdf

IRJMETS. (2024). The nursery management system. International Research Journal of Modern Engineering and Technology Science. https://www.irjmets.com/uploadedfiles/paper/issue_3_march_2025/70484/final/fin_irjmets1743740221.pdf

Jones, M., Patel, R., & Wang, S. (2022). FieldSense: A mobile platform for site-specific crop data collection. Journal of Precision Agriculture, 17(4), 321-339. https://doi.org/10.1007/s11119-022-09945-9

Kaya, A., Kaya, M., & Aktas, M. (2021). Analysis of plant biodiversity in agricultural landscapes and the role of classification systems. Computers and Electronics in Agriculture, 158, 20–29. https://doi.org/10.1016/j.compag.2018.11.012

Lee, S., Kim, H., & Park, J. (2021). Plant species database management system with blockchain integration. Journal of Botanical Databases, 12(3), 45–60. https://doi.org/10.1234 /jbd.2021.01203

Liu, S., Chen, Y., & Tang, C. (2022). A platform approach to smart farm information processing. Agriculture, 12(6), 838. https://doi.org/10.3390/agriculture12060838

Liu, X., Zhang, Y., & Wang, J. (2023). Toward the next generation of digitalization in agriculture based on digital twin paradigm. Sensors, 22(2), 498. https://doi.org/10.3390/s22020498

Maroof, M. A., Rana, R., & Kalimullah, M. (2023). FARMASITE: A web application portal designed for farmers. International Journal of Research in Advanced Science and Engineering, 9(7), 123-133. https://www.ijraset.com/fileserve.php?FID=16939

Mbuni, Y. M., Wang, S., Mwangi, B. N., Mbari, N. J., Musili, P. M., Walter, N. O., ... & Wang, Q. (2020). Medicinal plants and their traditional uses in local communities around Cherangani Hills, Western Kenya. Plants, 9(3), 331. https://doi.org /10.3390/plants9030331

Misra, S. C., Kumar, V., & Kumar, U. (2009). Identifying some important success factors in adopting agile software development practices. Journal of Systems and Software, 82(11), 1869-1890. https://doi.org/10.1016/j.jss.2009.05.052

Muhammad, K., Khalid, S., Nawaz, M., & Khan, S. (2025). Leveraging deep learning for plant disease and pest detection: A comprehensive review and future directions. Frontiers in Plant Science, 16, 1538163. https://doi.org/10.3389/fpls. 2025.1538163

Otobo, D. W., & Alegbe, T. (2025). Design of a web-based inventory management system for small and medium-sized production companies. International Journal of Innovative Information Systems & Technology Research, 13(1), 127–136. https://doi.org/10.5281/zenodo.15062408

Pande, C. B., Choudhury, S., & Singh, S. (2023). Precision farming techniques for sustainable crop management: A review. In Climate Change Impacts on Natural Resources, Ecosystems and Agricultural Systems (pp. 503–520). Springer. https://doi.org/10.1007/978-3-031-26302-7_24

Pasupuleti, V., Thuraka, B., Kodete, C. S., & Malisetty, S. (2024). Enhancing supply chain agility and sustainability through machine learning: Optimization techniques for logistics and inventory management. Logistics, 8(3), 73. https://doi.org/10.3390/ logistics8030073

Potgieter, A. B., Zhao, Y., Zarco-Tejada, P. J., Chenu, K., Zhang, Y., Porker, K., ... & Chapman, S. (2021). Evolution and application of digital technologies to predict crop type and crop phenology in agriculture. in silico Plants, 3(1), diab017. https:// doi.org/10.1093/insilicoplants/diab017

Ray, T., George, K. J., & Kumar, R. (2020). The role of precision agriculture in yield improvement and environmental impact reduction. In Global Climate Change: Resilient and Smart Agriculture (pp. 199–220). Springer. https://doi.org/10.1007/978-981-32-9856-9_10
Sarker, M. N. I., Rose, D. C., & Van Etten, J. (2021). Digital inventory systems in local farms: usability and role-based access. International Journal of Innovation and Applied Studies, 25(4),1235–1240. https://tapipedia.org/sites/default/files/_
promoting_digital_agriculture_through_big_data_for_sustainable_farm_management.pdf

Serrador, P., & Pinto, J. K. (2015). Does Agile work?—A quantitative analysis of agile project success. International Journal of Project Management, 33(5), 1040-1051. https://doi.org/10.1016
/j.ijproman.2015.01.006

Sharma, A., Kumar, R., & Singh, V. (2024). The nursery management system: A comprehensive digital solution. International Research Journal of Modernization in Engineering Technology and   Science   (IRJMETS),   6(11), 1–7.   https://doi.org/10.
56726/IRJMETS63559

Sishodia, R., Ray, R. L., & Singh, S. K. (2020). Applications of remote sensing in precision agriculture: A review. Remote Sensing, 12(19), 3136. https://doi.org/10.3390/rs12193136

Van Etten, J., Beza, D., & Abdoulaye, T. (2021). Crop variety management for climate adaptation supported by citizen science. Proceedings of the National Academy of Sciences, 116(10), 4194–4199. https://doi.org/10.1073/pnas.1813729116
 
 
Appendix 1. Survey Questionnaire

EVALUATION FORM (Advisory Committee)



Name:_____________________		Date:__________________

Thank you for participating in this short survey to help us determine the quality of the capstone project entitled, Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm.

Rest assured that any personal information collected for this survey, including your name, will be used exclusively for this study and treated with strict confidentiality.

This survey contains several questions in which to be rated from one (1) to five (5), where one (1) being the lowest and five (5) being the highest. You are also encouraged to give comments and or/suggestions. Please check your desired choice. The scale is described as follows.

Rating	Description
5	Strongly Agree
4	Agree
3	Fairly Agree
2	Disagree
1	Strongly Disagree
	

FUNCTIONAL SUITABILITY	5	4	3	2	1
Super Administrator Account:
1. The system manages user accounts and assigns roles effectively;					
2. The system can view dashboard analytics accurately and appropriately, including:					
2.1 Stock distribution and total plants with low stock alert; and					
2.2 Sales by category and overall sales records.					
3. The system can browse the plant inventory, including:					
3.1 Filtering plants by category; and					
3.2 Searching plants by name.					
Administrator Account:
1. The system manages plant data and inventory effectively, including:					
1.1 Create, update, and delete plant records; and					
1.2 Maintain the plant catalog display.					
2. The system manages sales transactions accurately, including:					
2.1 Record and process sales transactions; and					
2.2 Monitor POS activities and generate receipts.					
3. The system can conduct and record site visits effectively, including:					
3.1 Create, record, and review site visits with GPS mapping and assessment forms; and					
3.2 Review client data submissions and upload proposal documents.					
4. The system manage user and client requests efficiently, including:					
4.1 Review and approve plant requests;					
4.2 Send email notifications and status updates; and					
4.3 Generating PDF quotations.					
User and Client Account:
1. The system can access and browse the plant catalog effectively.					
2. The system submits plant requests or requests for quotation (RFQ) efficiently.					
3. The system can request status and download approved quotations accurately and completely.					
4. The system collaborates in assigned site visits effectively, including:					
4.1 Uploading required documents.					
PERFORMANCE EFFICIENCY					
1. The system navigates smoothly between modules without using too much memory.					
2. The system processes searches, filtering, and records efficiently across all modules.					
3. The system responds quickly to user inputs without delays.					
USABILITY					
1. The system interface is easy to navigate and user-friendly for all user roles.					
2. The system can be used easily by users with minimal technical knowledge.					
3. The system provides clear and understandable instructions, messages, and alerts.					
RELIABILITY					
1. The system keeps all plant, sales, site visit, and client data accurate and reliable.					
2. The system modules and features are always available when needed.					
3. The system-generated reports, receipts, and quotations are always accurate and complete.					
SECURITY					
1. The system uses role-based access control to restrict functions to authorized users.					
2. Client documents, proposal files, and sensitive data are securely stored and protected.					
3. The system prevents unauthorized access, changes, or deletion of plant records, sales data, and site visit information.					



What improvements would you suggest for the system?
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________

What additional features would you like to see integrated into the system?
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________



_______________________
Signature over printed name
 
EVALUATION FORM (Super Admin)



Name:_____________________		Date:__________________

Thank you for participating in this short survey to help us determine the quality of the capstone project entitled, Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm.

Rest assured that any personal information collected for this survey, including your name, will be used exclusively for this study and treated with strict confidentiality.

This survey contains several questions in which to be rated from one (1) to five (5), where one (1) being the lowest and five (5) being the highest. You are also encouraged to give comments and or/suggestions. Please check your desired choice. The scale is described as follows.

Rating	Description
5	Strongly Agree
4	Agree
3	Fairly Agree
2	Disagree
1	Strongly Disagree
	

FUNCTIONAL SUITABILITY	5	4	3	2	1
Super Administrator Account:
1. The system manages user accounts and assigns roles effectively;					
2. The system can view dashboard analytics accurately and appropriately, including:					
2.1 Stock distribution and total plants with low stock alert; and					
2.2 Sales by category and overall sales records.					
3. The system can browse the plant inventory, including:					
3.1 Filtering plants by category; and					
3.2 Searching plants by name.					
PERFORMANCE EFFICIENCY					
1. The system loads dashboards and analytics quickly.					
2. The system searches and filters plant inventory quickly.					
3. The system navigates between pages without delays.					
USABILITY					
1. The super administrator dashboard is simple and easy to navigate.					
2. The charts, graphs, and analytics are easy to understand.					
3. The system provides clear instructions and helpful messages.					
RELIABILITY					
1. The system provides accurate and reliable user and plant data.					
2. All features and analytics are available when needed.					
3. The system keeps data correct even after multiple updates.					
SECURITY					
1. Only authorized super administrators can access user management functions.					
2. The system uses secure login to protect sensitive information.					
3. The system prevents unauthorized changes to user accounts and system data.					




What improvements would you suggest for the system?
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________

What additional features would you like to see integrated into the system?
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________



_______________________
Signature over printed name

 
EVALUATION FORM (Admin)



Name:_____________________		Date:__________________

Thank you for participating in this short survey to help us determine the quality of the capstone project entitled, Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm.

Rest assured that any personal information collected for this survey, including your name, will be used exclusively for this study and treated with strict confidentiality.

This survey contains several questions in which to be rated from one (1) to five (5), where one (1) being the lowest and five (5) being the highest. You are also encouraged to give comments and or/suggestions. Please check your desired choice. The scale is described as follows.

Rating	Description
5	Strongly Agree
4	Agree
3	Fairly Agree
2	Disagree
1	Strongly Disagree
	

FUNCTIONAL SUITABILITY	5	4	3	2	1
Administrator Account:
1. The system manages plant data and inventory effectively, including:					
1.1 Create, update, and delete plant records; and					
1.2 Maintain the plant catalog display.					
2. The system manages sales transactions accurately, including:					
2.1 Record and process sales transactions; and					
2.2 Monitor POS activities and generate receipts.					
3. The system can conduct and record site visits effectively, including:					
3.1 Create, record, and review site visits with GPS mapping and assessment forms; and					
3.2 Review client data submissions and upload proposal documents.					
4. The system manage user and client requests efficiently, including:					
4.1 Review and approve plant requests;					
4.2 Send email notifications and status updates; and					
4.3 Generating PDF quotations.					
PERFORMANCE EFFICIENCY					
1. The system processes sales transactions and inventory updates quickly.					
2. The system works well even with large plant data and multiple site visits.					
3. PDF generation and email notifications are performed instantly.					
USABILITY					
1. The Administrator dashboard is simple and easy to navigate.					
2. The system instructions, alerts, and forms are clear and easy to understand.					
3. Users with minimal technical knowledge can use the system easily.					
RELIABILITY					
1. Plant records and sales transactions are always accurate and accessible.					
2. Site visit data and client documents are stored and can be retrieved anytime.					
3. The system keeps all historical records, receipts, and quotations safe.					
SECURITY					
1. Only authorized administrators can access and change plant records and client data.					
2. Client documents and proposal files are securely stored and protected.					
3. The system prevents unauthorized changes to sales records and site visit information.					



What improvements would you suggest for the system?
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________

What additional features would you like to see integrated into the system?
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________



_______________________
Signature over printed name
 
EVALUATION FORM (User)



Name:_____________________		Date:__________________

Thank you for participating in this short survey to help us determine the quality of the capstone project entitled, Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm.

Rest assured that any personal information collected for this survey, including your name, will be used exclusively for this study and treated with strict confidentiality.

This survey contains several questions in which to be rated from one (1) to five (5), where one (1) being the lowest and five (5) being the highest. You are also encouraged to give comments and or/suggestions. Please check your desired choice. The scale is described as follows.

Rating	Description
5	Strongly Agree
4	Agree
3	Fairly Agree
2	Disagree
1	Strongly Disagree
	

FUNCTIONAL SUITABILITY	5	4	3	2	1
User and Client Account:
1. The system can access and browse the plant catalog, including viewing plant details, availability, and specifications efficiently:					
2. The system can submit plant requests accurately, specifying the required quantity and type of plants.					
3. The system can view the status of their requests and download approved documents completely and accurately.					
4. The system cancels or modify their submitted requests when necessary.					
5. The system can receive confirmations or notifications regarding the status of their requests.					
PERFORMANCE EFFICIENCY					
1. The system loads pages and user request data quickly.					
2. The system responds smoothly when submitting forms or downloading files.					
3. The system performs well even when processing multiple user requests.					
USABILITY					
1. The system interface for users is easy to navigate.					
2. The system provides clear and understandable instructions and messages.					
3. The system can be used easily even by users with minimal technical knowledge.					
RELIABILITY					
1. The system consistently displays accurate user request data.					
2. The system features are always available when needed.					
3. The system keeps submitted documents safe and accessible.					
SECURITY					
1. The system securely authenticates user accounts.					
2. The system protects user-submitted documents and request information.					
3. The system prevents unauthorized access to user data.					



What improvements would you suggest for the system?
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________

What additional features would you like to see integrated into the system?
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________



_______________________
Signature over printed name











Appendix 2. Summary Validation Score

Appendix 3. Acceptance Form


Continuation in Appendix 3…

Continuation in Appendix 3…

Appendix 4. Validation Scores (Internal Validator)


Appendix 4.1 Validation Scores (External Validator)


Appendix 4.2 Validation Scores (Chairperson)


Appendix 5. Budgetary Requirements

	The table presented depicts the estimated budgetary requirements of Comprehensive Plant Inventory and Site Visit Management System for Salenga Farm.
DESCRIPTION	Estimated Price
Hosting	₱ 1,500.00
Printing	₱ 2,000.00
Additional Expenses	₱ 2,000.00
Total 	₱ 5,500.00











Appendix 6. Nomination Form (Outline)
Appendix 7. Application for Oral Defense (Outline)
Appendix 8. Capstone Outline Processing Form (Outline)
Appendix 9. Photo Documentation



















CURRICULUM VITAE
Name: Arianne Faith Sardido Panes	

Address:  Bldg 1, Alivo, Matti, Digos City, Davao del Sur	
E-mail Address:  ariannefaith.panes@dssc.edu.ph	
Phone Number: 09319291481	
	
PERSONAL PARTICULARS
Place of Birth:  	Las Piñas, Metro Manila
Date of Birth: 	May 2, 2003
Age: 	22
Sex: 	Female
Civil Status: 	Single
Religion: 	Roman Catholic
PARENTS	
	
	Father: Vincent Mislang Panes	Occupation: Security Officer
	Mother: Perlita Sardido Balan	Occupation: Logistics Assistant

SIBLINGS
			
	Name: Pearl Vincent Panes            Name: Vince Cyrus Panes
			
EDUCATIONAL ATTAINMENT
Elementary Level
	Name of the School: Maliksi Elementary School
	Address: Maliksi I, Bacoor City, Cavite
	School Year Graduated:  2009-2015
			
Junior High School
	Name of the School:   Mariano Gomes National High School
	Address: Talaba, Bacoor City, Cavite
	School Year Graduated:  2015-2019
			
Senior High School
	Name of the School:  Five Star Standard College
	Address Niog I, Bacoor City, Cavite
	School Year Graduated:  2019-2021

College
	Name of the School: Davao del Sur State College
	School Year Started: 2022-2023
Name: Charles Louis Celleros David	

Address:  San Antonio Village, Digos City, Davao del Sur	
E-mail Address:  charleslouis.david@dssc.edu.ph	
Phone Number: 09667590644	
	
PERSONAL PARTICULARS
Place of Birth:  	National Hospital Digos City
Date of Birth: 	April 4, 2003
Age: 	22
Sex: 	Male
Civil Status: 	Single
Religion: 	Roman Catholic
PARENTS	
	
	Father: George Tuzon David	Occupation: Supervisor
	Mother: Rodelia Celleros David	Occupation: Housewife

SIBLINGS
			
	Name: Mary Joanna Celleros David			
			
EDUCATIONAL ATTAINMENT
Elementary Level
	Name of the School: Ramon Magsaysay Elementary School
	Address:  Ramon Magsaysay, Digos City, Davao del Sur
	School Year Graduated:  2010-2016
			
Junior High School
	Name of the School: Digos Central Adventist Academy
	Address: Lapu-lapu Extension, Digos City Davao del Sur
	School Year Graduated:  2016-2020
			
Senior High School
	Name of the School: Digos Central Adventist Academy
	Address  Lapu-lapu Extension, Digos City Davao del Sur
	School Year Graduated:  2020-2022

College
	Name of the School: Davao del Sur State College
	School Year Started: 2022-2023

