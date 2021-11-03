using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebApplication1.Models
{
    public class Comment
    {
        public int CommentId { get; set; }
        public int CommentUserId { get; set; }
        public int CommentPostId { get; set; }
        public string CommentText { get; set; }
        public string CommentParentId { get; set; }
    }
}
