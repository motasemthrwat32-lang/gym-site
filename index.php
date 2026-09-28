<?php
// محاكاة لبيانات الطالب المسجل (في الموقع الفعلي تأتي من الجلسة Session)
$student_name = "محمد أحمد";
$student_phone = "01012345678";
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>منصة التعلم الإلكتروني | الكورسات والتدريبات</title>
  
  <!-- Tailwind CSS & الخط العربي -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
  
  <style>
    body { font-family: 'Cairo', sans-serif; }
    
    /* أنيميشن العلامة المائية المتحركة لحماية الفيديو */
    @keyframes moveWatermark {
      0% { top: 10%; left: 10%; }
      25% { top: 10%; left: 70%; }
      50% { top: 80%; left: 70%; }
      75% { top: 80%; left: 10%; }
      100% { top: 10%; left: 10%; }
    }
    .moving-watermark {
      position: absolute;
      animation: moveWatermark 12s infinite linear;
      pointer-events: none; /* تضمن عدم إعاقة الضغط على الفيديو */
      user-select: none;
      opacity: 0.35;
    }
  </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-between">

  <!-- الهيدر وشريط التنقل -->
  <header class="bg-slate-800 border-b border-slate-700 p-4 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <div class="flex items-center gap-2">
        <span class="text-2xl">🎓</span>
        <h1 class="text-xl font-bold text-emerald-400">أكاديمية التعلم الذكي</h1>
      </div>
      <div class="flex items-center gap-4 text-sm">
        <span class="bg-slate-700 px-3 py-1 rounded-full text-slate-300">مرحباً، <?php echo $student_name; ?></span>
        <a href="#courses" class="bg-emerald-500 hover:bg-emerald-600 text-slate-900 font-bold px-4 py-1.5 rounded-lg transition">الكورسات</a>
      </div>
    </div>
  </header>

  <!-- القسم الرئيسي - مشغل المحتوى وحماية الفيديوهات -->
  <main class="max-w-6xl mx-auto p-4 w-full my-6">
    
    <!-- منطقة مشغل الفيديو والدرس الحالي -->
    <section class="bg-slate-800 border border-slate-700 rounded-2xl p-4 shadow-xl mb-8">
      <h2 class="text-xl font-bold text-emerald-400 mb-3">الدرس 1: مقدمة وأساسيات الكورس</h2>
      
      <!-- حاوية الفيديو مع العلامة المائية -->
      <div class="relative w-full aspect-video bg-black rounded-xl overflow-hidden border border-slate-700">
        
        <!-- مشغل الفيديو (يمكن ربطه برابط Bunny.net Stream) -->
        <video id="courseVideo" class="w-full h-full" controls controlsList="nodownload" oncontextmenu="return false;">
          <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4" type="video/mp4">
          متصفحك لا يدعم تشغيل الفيديو.
        </video>

        <!-- العلامة المائية المتحركة لحماية المحتوى من تسجيل الشاشة -->
        <div class="moving-watermark bg-red-600/80 text-white text-xs font-bold px-2 py-1 rounded shadow-md border border-white/20">
          <?php echo $student_phone; ?> - <?php echo $student_name; ?>
        </div>
      </div>
      
      <p class="text-xs text-slate-400 mt-2">🛡️ هذا المحتوى محمي بموجب حقوق النشر. يُمنع تسجيل الشاشة أو إعادة مشاركتها.</p>
    </section>

    <!-- قائمة الكورسات المتاحة -->
    <section id="courses">
      <h3 class="text-2xl font-bold text-slate-100 mb-6 flex items-center gap-2">
        <span>📚</span> الكورسات المتاحة للاشتراك
      </h3>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- كارت كورس 1 -->
        <div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-lg flex flex-col justify-between">
          <div>
            <div class="h-40 bg-gradient-to-r from-emerald-600 to-teal-800 flex items-center justify-center text-4xl">
              💻
            </div>
            <div class="p-5">
              <span class="text-xs font-semibold bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded">تقنية وبرمجة</span>
              <h4 class="text-lg font-bold text-slate-100 mt-2">كورس البرمجة للجميع من الصفر</h4>
              <p class="text-slate-400 text-sm mt-1">تعلم أساسيات البرمجة والتفكير المنطقي لبناء تطبيقات ومواقع كاملة.</p>
            </div>
          </div>
          <div class="p-5 pt-0 border-t border-slate-700/50 mt-4 flex items-center justify-between">
            <div>
              <span class="text-xs text-slate-400 block">السعر</span>
              <span class="text-lg font-bold text-emerald-400">499 ج.م</span>
            </div>
            <button onclick="openPaymentModal('كورس البرمجة للجميع', '499')" class="bg-emerald-500 hover:bg-emerald-600 text-slate-900 font-bold px-4 py-2 rounded-lg text-sm transition">
              اشترك الآن
            </button>
          </div>
        </div>

        <!-- كارت كورس 2 -->
        <div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-lg flex flex-col justify-between">
          <div>
            <div class="h-40 bg-gradient-to-r from-blue-600 to-indigo-800 flex items-center justify-center text-4xl">
              🚀
            </div>
            <div class="p-5">
              <span class="text-xs font-semibold bg-blue-500/20 text-blue-400 px-2 py-1 rounded">تسويق وصناعة محتوى</span>
              <h4 class="text-lg font-bold text-slate-100 mt-2">احترف التسويق بالذكاء الاصطناعي</h4>
              <p class="text-slate-400 text-sm mt-1">طريقة استخدام أدوات الـ AI لمضاعفة المبيعات وإنشاء الحملات الإعلانية.</p>
            </div>
          </div>
          <div class="p-5 pt-0 border-t border-slate-700/50 mt-4 flex items-center justify-between">
            <div>
              <span class="text-xs text-slate-400 block">السعر</span>
              <span class="text-lg font-bold text-emerald-400">299 ج.م</span>
            </div>
            <button onclick="openPaymentModal('كورس التسويق بالذكاء الاصطناعي', '299')" class="bg-emerald-500 hover:bg-emerald-600 text-slate-900 font-bold px-4 py-2 rounded-lg text-sm transition">
              اشترك الآن
            </button>
          </div>
        </div>

      </div>
    </section>

  </main>

  <!-- نافذة التفاعل للدفع (Modal Payment Window) -->
  <div id="paymentModal" class="fixed inset-0 bg-black/80 hidden backdrop-blur-sm justify-center items-center p-4 z-50">
    <div class="bg-slate-800 border border-slate-700 rounded-2xl max-w-md w-full p-6 text-right relative shadow-2xl">
      <button onclick="closePaymentModal()" class="absolute left-4 top-4 text-slate-400 hover:text-white">✕</button>
      
      <h3 class="text-xl font-bold text-emerald-400 mb-1" id="modalCourseTitle">تأكيد الاشتراك</h3>
      <p class="text-sm text-slate-300 mb-4">المبلغ المطلوب: <span id="modalCoursePrice" class="font-bold text-white"></span> جنيه مصري</p>
      
      <!-- اختيار طريق الدفع -->
      <div class="space-y-3 mb-6">
        <label class="block p-3 border border-slate-700 rounded-xl bg-slate-900/50 hover:border-emerald-500 cursor-pointer transition flex items-center gap-3">
          <input type="radio" name="payMethod" value="vodafone" checked class="accent-emerald-500">
          <div>
            <span class="font-bold block text-sm">فودافون كاش / المحافظ الإلكترونية</span>
            <span class="text-xs text-slate-400">تحويل مباشر وسريع عبر المحفظة</span>
          </div>
        </label>
        
        <label class="block p-3 border border-slate-700 rounded-xl bg-slate-900/50 hover:border-emerald-500 cursor-pointer transition flex items-center gap-3">
          <input type="radio" name="payMethod" value="card" class="accent-emerald-500">
          <div>
            <span class="font-bold block text-sm">الفيزا والماستركارد (Paymob)</span>
            <span class="text-xs text-slate-400">دفع إلكتروني آمن فوراً</span>
          </div>
        </label>
      </div>

      <button onclick="processPayment()" class="w-full bg-emerald-500 hover:bg-emerald-600 text-slate-900 font-bold py-3 rounded-xl transition">
        إتمام التفعيل وتأكيد الدفع
      </button>
    </div>
  </div>

  <footer class="bg-slate-800 border-t border-slate-700 p-4 text-center text-xs text-slate-500">
    جميع الحقوق محفوظة &copy; 2026 - أكاديمية التعلم الذكي
  </footer>

  <!-- السكريبتات للتفاعل -->
  <script>
    function openPaymentModal(title, price) {
      document.getElementById('modalCourseTitle').innerText = title;
      document.getElementById('modalCoursePrice').innerText = price;
      document.getElementById('paymentModal').classList.remove('hidden');
      document.getElementById('paymentModal').classList.add('flex');
    }

    function closePaymentModal() {
      document.getElementById('paymentModal').classList.add('hidden');
      document.getElementById('paymentModal').classList.remove('flex');
    }

    function processPayment() {
      alert("جاري توجيهك لبوابة الدفع لإتمام العملية بنجاح! 💳");
      closePaymentModal();
    }
  </script>
</body>
</html>