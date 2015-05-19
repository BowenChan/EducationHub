
<body ui-view = "right" ng-app>
    <div ng-controller = "pagination" >
    

        <pre>The selected page no: {{currentPage+1}}</pre>
        <button class="btn btn-info" ng-click="setPage(3)">Set current page to: 3</button>
            <hr />
        <label>Search: <input ng-model="searchText"></label>
        <table>
            <tr>
                <td>Title</td>
                <td>Description</td> 
                <td>Lesson Link</td>
                <td>Lesson Image</td>
                <td>Category</td>
                <td>Grade level</td>
                <td>Author</td>
                <td>Content Type</td>
                <td>Time Scraped</td>
            </tr>
            
                <tr ng-repeat = "data in items.Video | filter:searchText ">
                    <td> {{data.Title}} </td>
                    <td> {{data.Description}} </td>
                    <td> <a href = "{{data.Link}}"> Link </a> </td>
                    <td> <img src = "{{data.Image}}"> </td>
                    <td> {{data.Category}} </td>
                    <td> {{data.Grade}} </td>
                    <td> {{data.Author}} </td>
                    <td> {{data.Content}} </td>
                    <td> {{data.TimeScraped}}</td>
                    
                </tr>
            
        </table>
        
        <hr />
        <pre>Page: {{bigCurrentPage}} / {{numPages}}</pre>
    </div>
</p>