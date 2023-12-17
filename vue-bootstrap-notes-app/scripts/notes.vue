 new Vue({
        el: '#app',
        data: {
          priorityOrder: ['high', 'medium', 'low'],
          orderNames: {'high': 'Высокий', 'medium':'Средний', 'low': 'Низкий'},
          newNote: {
            text: '',
            priority: 'low',
            isImportant: false,
            status: 'Принять к сведению'
          },
          notes: []
        },
        mounted() {
          // Загрузка данных из localStorage при загрузке страницы
          const savedNotes = localStorage.getItem('notes');
          if (savedNotes) {
            this.notes = JSON.parse(savedNotes);
          }
        },
         computed: {
          sortedNotes() {
            return this.notes.slice().sort((a, b) => {
              const priorityComparison = this.priorityOrder.indexOf(a.priority) - this.priorityOrder.indexOf(b.priority);
              return priorityComparison !== 0 ? priorityComparison : b.createdAt - a.createdAt;
            });
          }
        },
        methods: {
          addNote() {
            this.newNote.createdAt = Date.now();
            if (this.newNote.status.length == 0 ) this.newNote.status = "Принять к сведению";
            this.notes.push({ ...this.newNote });
            this.saveData();
            this.resetForm();
          },
          removeNote(index) {
            this.notes.splice(index, 1);
            this.saveData();
          },
          saveData() {
            localStorage.setItem('notes', JSON.stringify(this.notes));
          },
          resetForm() {
            // Сброс формы
            this.newNote = {
              text: '',
              priority: 'low',
              isImportant: false
            };
          },
          resetData() {
            localStorage.removeItem('notes');
            this.notes = [];
          },
          formatDateTime(timestamp) {
            const options = { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
            return new Date(timestamp).toLocaleString('en-US', options);
          }
        }
      });
