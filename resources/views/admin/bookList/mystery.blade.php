<div class="bookViewList">
    <div class="head">
        <h3>អាថ៏កំបាំង</h3>
        <form action="" method="get">
            <div class="findBook">
                <input placeholder="ស្វែងរកសៀវភៅ" type="text" id="findBook4" name="findBook4">
                <button><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>រូបភាព</th>
                <th>ឈ្មោះ</th>
                <th>កាលបរច្ឆេទបញ្ចូល</th>
                <th>កែប្រែ</th>
                <th>លុប</th>
            </tr>
        </thead>
        <tbody id="bookList4">
            @foreach ($books4 as $book)
                <tr>
                    <td>
                        <img src="{{ asset('uploads/' . $book->CoverImage) }}" alt="{{ $book->Title }}" />
                    </td>
                    <td>
                        <p>{{ $book->Title }}</p>
                    </td>
                    <td>{{ date('Y-m-d', strtotime($book->created_at)) }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}">
                            <button type="button" class="edit" style="background-color: green;">កែសម្រួល</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="delete-form"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-button" style="background-color: red;">លុប</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- Confirmation Modal HTML -->
            <div id="confirmationModal"
                style="display: none; position: fixed; z-index: 1000; background-color: rgba(0,0,0,0.5); top: 0; left: 0; width: 100%; height: 100%; justify-content: center; align-items: center;">
                <div style="background-color: white; padding: 20px; border-radius: 10px; text-align: center;">
                    <div>តើអ្នកពិតជាចង់លុបសៀវភៅនេះមែនទេ?</div>
                    <br>
                    <button id="confirmDelete" style="margin-right: 10px;">បាទ</button>
                    <button id="cancelDelete">ទេ</button>
                </div>
            </div>

        </tbody>
    </table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let deleteForm;

        // Real-time search function
        document.getElementById('findBook4').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#bookList4 tr');

            rows.forEach(row => {
                let title = row.querySelector('td:nth-child(2) p').textContent.toLowerCase();
                if (title.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                deleteForm = this.closest('form');
                document.getElementById('confirmationModal').style.display = 'flex';
            });
        });
        document.getElementById('confirmDelete').addEventListener('click', function() {
            if (deleteForm) {
                deleteForm.submit();
            }
        });
        document.getElementById('cancelDelete').addEventListener('click', function() {
            document.getElementById('confirmationModal').style.display = 'none';
        });
    });
</script>
