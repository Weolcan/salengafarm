<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Plant Request #{{ $request->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
            color: #333;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #198754;
        }
        .header h1 {
            margin: 0;
            color: #198754;
            font-size: 24px;
        }
        .header h2 {
            margin: 5px 0 0;
            font-size: 16px;
        }
        .info-section {
            margin: 20px 0;
        }
        .info-section h3 {
            margin: 0 0 10px;
            font-size: 14px;
            color: #198754;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        table th {
            background-color: #f5f5f5;
            text-align: left;
            padding: 8px;
            font-weight: bold;
            border: 1px solid #ddd;
        }
        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 11px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .label {
            font-weight: bold;
            width: 150px;
        }
        .info-table td {
            padding: 5px;
            border: none;
        }
        .vendor-info {
            margin-bottom: 20px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>SALENGA FARM</h1>
            <h2>PLANT REQUEST</h2>
        </div>
        
        <div class="vendor-info">
            <h3>Vendor Information</h3>
            <table class="info-table">
                <tr>
                    <td class="label">Company:</td>
                    <td>ESTHER LIBRES SALENGA ESTHER'S FLOWER GARDEN AND LANDSCAPING</td>
                </tr>
                <tr>
                    <td class="label">Address:</td>
                    <td>INFRONT OF FATIMA VILLAGE SITIO MCL.DAVAO CITY.PH</td>
                </tr>
                <tr>
                    <td class="label">TIN:</td>
                    <td>47496058600000</td>
                </tr>
            </table>
        </div>
        
        <div class="info-section">
            <h3>Request Details</h3>
            <table class="info-table">
                <tr>
                    <td class="label">Request #:</td>
                    <td>{{ $request->id }}</td>
                    <td class="label">Date:</td>
                    <td>{{ date('F d, Y', strtotime($request->request_date)) }}</td>
                </tr>
                <tr>
                    <td class="label">Status:</td>
                    <td>{{ ucfirst($request->status) }}</td>
                    <td class="label">Due Date:</td>
                    <td>{{ date('F d, Y', strtotime($request->due_date)) }}</td>
                </tr>
            </table>
        </div>
        
        <div class="info-section">
            <h3>Customer Information</h3>
            <table class="info-table">
                <tr>
                    <td class="label">Name:</td>
                    <td>{{ $request->name }}</td>
                </tr>
                <tr>
                    <td class="label">Email:</td>
                    <td>{{ $request->email }}</td>
                </tr>
                @if($request->phone)
                <tr>
                    <td class="label">Phone:</td>
                    <td>{{ $request->phone }}</td>
                </tr>
                @endif
                @if($request->address)
                <tr>
                    <td class="label">Address:</td>
                    <td>{{ $request->address }}</td>
                </tr>
                @endif
            </table>
        </div>
        
        <div class="info-section">
            <h3>Requested Plants</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Plant Name</th>
                        <th>Quantity</th>
                        @if(isset($request->items_json[0]['code']))
                        <th>Code</th>
                        @endif
                        @if(isset($request->items_json[0]['height']))
                        <th>Height</th>
                        @endif
                        @if(isset($request->items_json[0]['spread']))
                        <th>Spread</th>
                        @endif
                        @if(isset($request->items_json[0]['spacing']))
                        <th>Spacing</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($request->items_json as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['name'] ?? '' }}</td>
                        <td>{{ $item['quantity'] ?? 1 }}</td>
                        @if(isset($request->items_json[0]['code']))
                        <td>{{ $item['code'] ?? '' }}</td>
                        @endif
                        @if(isset($request->items_json[0]['height']))
                        <td>{{ $item['height'] ?? '' }}</td>
                        @endif
                        @if(isset($request->items_json[0]['spread']))
                        <td>{{ $item['spread'] ?? '' }}</td>
                        @endif
                        @if(isset($request->items_json[0]['spacing']))
                        <td>{{ $item['spacing'] ?? '' }}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($request->message)
        <div class="info-section">
            <h3>Additional Information</h3>
            <p>{{ $request->message }}</p>
        </div>
        @endif
        
        <div class="footer">
            <p>This document was generated on {{ date('F d, Y') }}. For any inquiries, please contact us at salengafarm@example.com</p>
        </div>
    </div>
</body>
</html> 