class EventCreator {
    constructor() {
        this.tags = [];
        this.initializeEventListeners();
        this.initializeFormValidation();
        this.setupRegistrationToggle();
    }

    initializeEventListeners() {
        // Preview button
        document.getElementById('previewBtn').addEventListener('click', () => {
            this.showPreview();
        });

        // Back to edit button
        document.getElementById('backToEditBtn').addEventListener('click', () => {
            this.showForm();
        });

        // Tag management
        document.getElementById('addTagBtn').addEventListener('click', () => {
            this.addTag();
        });

        document.getElementById('tagInput').addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.addTag();
            }
        });

        // Form submission
        document.getElementById('createEventForm').addEventListener('submit', (e) => {
            this.handleFormSubmit(e);
        });

        // Real-time preview updates
        this.setupRealTimePreview();
    }

    initializeFormValidation() {
        // Add custom validation styles
        const form = document.getElementById('createEventForm');
        form.addEventListener('submit', (e) => {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        });

        // Time validation
        const startTime = document.getElementById('startTime');
        const endTime = document.getElementById('endTime');
        
        [startTime, endTime].forEach(input => {
            input.addEventListener('change', () => {
                this.validateTimes();
            });
        });

        // Date validation
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');
        const registrationDeadline = document.getElementById('registrationDeadline');

        startDate.addEventListener('change', () => {
            this.validateDates();
        });

        endDate.addEventListener('change', () => {
            this.validateDates();
        });

        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        startDate.min = today;
        endDate.min = today;
        registrationDeadline.min = today;
    }

    setupRegistrationToggle() {
        const requireRegistration = document.getElementById('requireRegistration');
        const registrationDeadlineGroup = document.getElementById('registrationDeadlineGroup');
        const waitlistGroup = document.getElementById('waitlistGroup');

        requireRegistration.addEventListener('change', () => {
            if (requireRegistration.checked) {
                registrationDeadlineGroup.style.display = 'block';
                waitlistGroup.style.display = 'block';
            } else {
                registrationDeadlineGroup.style.display = 'none';
                waitlistGroup.style.display = 'none';
            }
        });
    }

    setupRealTimePreview() {
        const inputs = [
            'eventTitle', 'eventDescription', 'eventCategory', 'eventCapacity',
            'startDate', 'endDate', 'startTime', 'endTime',
            'eventLocation', 'eventVenue', 'contactEmail', 'contactPhone'
        ];

        inputs.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('input', () => {
                    this.updatePreview();
                });
            }
        });
    }

    validateTimes() {
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;
        const endTimeInput = document.getElementById('endTime');

        if (startTime && endTime && startTime >= endTime) {
            endTimeInput.setCustomValidity('End time must be after start time');
        } else {
            endTimeInput.setCustomValidity('');
        }
    }

    validateDates() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const endDateInput = document.getElementById('endDate');

        if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
            endDateInput.setCustomValidity('End date must be after start date');
        } else {
            endDateInput.setCustomValidity('');
        }

        // Update registration deadline max date
        const registrationDeadline = document.getElementById('registrationDeadline');
        if (startDate) {
            registrationDeadline.max = startDate;
        }
    }

    addTag() {
        const tagInput = document.getElementById('tagInput');
        const tagValue = tagInput.value.trim();

        if (tagValue && !this.tags.includes(tagValue) && this.tags.length < 10) {
            this.tags.push(tagValue);
            this.renderTags();
            tagInput.value = '';
            this.updatePreview();
        }
    }

    removeTag(tagToRemove) {
        this.tags = this.tags.filter(tag => tag !== tagToRemove);
        this.renderTags();
        this.updatePreview();
    }

    renderTags() {
        const container = document.getElementById('tagsContainer');
        container.innerHTML = this.tags.map(tag => 
            `<button type="button" class="tag" onclick="eventCreator.removeTag('${tag}')">
                ${tag} <span class="remove-tag">&times;</span>
            </button>`
        ).join('');
    }

    showPreview() {
        this.updatePreview();
        document.getElementById('eventForm').classList.add('d-none');
        document.getElementById('eventPreview').classList.remove('d-none');
        document.getElementById('eventPreview').classList.add('fade-in');
    }

    showForm() {
        document.getElementById('eventPreview').classList.add('d-none');
        document.getElementById('eventForm').classList.remove('d-none');
        document.getElementById('eventForm').classList.add('slide-up');
    }

    updatePreview() {
        // Update title
        const title = document.getElementById('eventTitle').value || 'Event Title';
        document.getElementById('previewTitle').textContent = title;

        // Update description
        const description = document.getElementById('eventDescription').value || 'Event description will appear here...';
        document.getElementById('previewDescription').textContent = description;

        // Update date
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        
        if (startDate) {
            const dateObj = new Date(startDate);
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            let dateText = dateObj.toLocaleDateString('en-US', options);
            
            if (endDate && endDate !== startDate) {
                const endDateObj = new Date(endDate);
                dateText += ' - ' + endDateObj.toLocaleDateString('en-US', options);
            }
            
            document.getElementById('previewDate').textContent = dateText;
        } else {
            document.getElementById('previewDate').textContent = 'Date TBD';
        }

        // Update time
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;
        
        if (startTime && endTime) {
            document.getElementById('previewTime').textContent = this.formatTime(startTime) + ' - ' + this.formatTime(endTime);
        } else {
            document.getElementById('previewTime').textContent = '';
        }

        // Update location
        const location = document.getElementById('eventLocation').value || 'Location TBD';
        document.getElementById('previewLocation').textContent = location;

        const venue = document.getElementById('eventVenue').value;
        document.getElementById('previewVenue').textContent = venue;

        // Update capacity
        const capacity = document.getElementById('eventCapacity').value;
        const capacityDiv = document.getElementById('previewCapacityDiv');
        
        if (capacity) {
            document.getElementById('previewCapacity').textContent = capacity;
            capacityDiv.style.display = 'flex';
        } else {
            capacityDiv.style.display = 'none';
        }

        // Update contact
        const email = document.getElementById('contactEmail').value;
        const phone = document.getElementById('contactPhone').value;
        let contactText = '';
        
        if (email) contactText += 'Email: ' + email;
        if (email && phone) contactText += ' | ';
        if (phone) contactText += 'Phone: ' + phone;
        
        document.getElementById('previewContact').textContent = contactText;

        // Update tags
        this.updatePreviewTags();
    }

    updatePreviewTags() {
        const container = document.getElementById('previewTags');
        const category = document.getElementById('eventCategory').value;
        
        let tagsHTML = '';
        
        if (category) {
            tagsHTML += `<span class="badge badge-primary me-2">${category}</span>`;
        }
        
        this.tags.forEach(tag => {
            tagsHTML += `<span class="badge badge-secondary me-2">${tag}</span>`;
        });
        
        container.innerHTML = tagsHTML;
    }

    formatTime(time) {
        const [hours, minutes] = time.split(':');
        const hour = parseInt(hours);
        const ampm = hour >= 12 ? 'PM' : 'AM';
        const displayHour = hour % 12 || 12;
        return `${displayHour}:${minutes} ${ampm}`;
    }

    handleFormSubmit(e) {
        e.preventDefault();
        
        const form = e.target;
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            return;
        }

        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.classList.add('btn-loading');
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Creating Event...';
        submitBtn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            // Reset button
            submitBtn.classList.remove('btn-loading');
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;

            // Show success modal
            const modal = new bootstrap.Modal(document.getElementById('successModal'));
            modal.show();

            // Reset form
            this.resetForm();
        }, 2000);
    }

    resetForm() {
        document.getElementById('createEventForm').reset();
        document.getElementById('createEventForm').classList.remove('was-validated');
        this.tags = [];
        this.renderTags();
        this.showForm();
    }

    getFormData() {
        return {
            title: document.getElementById('eventTitle').value,
            description: document.getElementById('eventDescription').value,
            category: document.getElementById('eventCategory').value,
            capacity: document.getElementById('eventCapacity').value,
            startDate: document.getElementById('startDate').value,
            endDate: document.getElementById('endDate').value,
            startTime: document.getElementById('startTime').value,
            endTime: document.getElementById('endTime').value,
            location: document.getElementById('eventLocation').value,
            venue: document.getElementById('eventVenue').value,
            requireRegistration: document.getElementById('requireRegistration').checked,
            registrationDeadline: document.getElementById('registrationDeadline').value,
            allowWaitlist: document.getElementById('allowWaitlist').checked,
            sendReminders: document.getElementById('sendReminders').checked,
            isPublic: document.getElementById('isPublic').checked,
            contactEmail: document.getElementById('contactEmail').value,
            contactPhone: document.getElementById('contactPhone').value,
            tags: this.tags
        };
    }
}

// Initialize the event creator when the page loads
let eventCreator;

document.addEventListener('DOMContentLoaded', () => {
    eventCreator = new EventCreator();
    
    // Add smooth scrolling for better UX
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add animation classes to cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('slide-up');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });
});

// Utility functions
function showToast(message, type = 'success') {
    // Simple toast notification (can be enhanced with Bootstrap toast)
    const toastHtml = `
        <div class="toast align-items-center text-white bg-${type} border-0 position-fixed top-0 end-0 m-3" 
             role="alert" style="z-index: 9999;">
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" 
                        data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', toastHtml);
    const toast = new bootstrap.Toast(document.querySelector('.toast:last-child'));
    toast.show();
}

// Auto-save functionality (optional)
function autoSave() {
    if (eventCreator) {
        const formData = eventCreator.getFormData();
        localStorage.setItem('eventDraft', JSON.stringify(formData));
        showToast('Draft saved automatically', 'info');
    }
}

// Auto-save every 30 seconds
setInterval(autoSave, 30000);