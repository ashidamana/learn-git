# learn-git
learn git

在现有目录中初始化仓库
git init 

跟踪新文件
git add 

提交更新
git commit 

克隆现有的仓库
git clone

检查当前文件状态
git status

一个常用的选项是 -p，用来显示每次提交的内容差异。 你也可以加上 -2 来仅显示最近两次提交
git log -p -2

最终你只会有一个提交 - 第二次提交将代替第一次提交的结果。（比如想修改commit备注时，要在push前执行）
git commit --amend

Git 提供了一个跳过使用暂存区域的方式， 只要在提交的时候，给 git commit 加上 -a 选项，Git 就会自动把所有已经跟踪过的文件暂存起来一并提交，从而跳过 git add 步骤
git commit -a

取消都对某个文件的add
git reset HEAD <file>

撤消对文件的修改
git checkout -- <file>

查看远程仓库
git remote -v

添加远程仓库
git remote add <shortname> <url>

从远程仓库中抓取与拉取,这个命令会访问远程仓库，从中拉取所有你还没有的数据。 执行完成后，你将会拥有那个远程仓库中所有分支的引用，可以随时合并或查看。
git fetch [remote-name]

当你想要将 master 分支推送到 origin 服务器时
git push [remote-name] [branch-name]

查看远程仓库
git remote show [remote-name]

远程仓库的重命名
想要将 pb 重命名为 paul
git remote rename pb paul

远程仓库的移除
git remote rm paul

列出标签
git tag

git tag -l 'v1.8.5*'


创建标签
git tag -a v1.4 -m 'my version 1.4'

后期打标签
$ git log --pretty=oneline
15027957951b64cf874c3557a0f3547bd83b3ff6 Merge branch 'experiment'
a6b4c97498bd301d84096da251c98a07c7723e65 beginning write support
0d52aaab4479697da7686c15f77a3d64d9165190 one more thing
6d52a271eda8725415634dd79daabbc4d9b6008e Merge branch 'experiment'
0b7434d86859cc7b8c3d5e1dddfed66ff742fcbc added a commit function
4682c3261057305bdd616e23b64b0857d832627b added a todo file
166ae0c4d3f420721acbb115cc33848dfcc2121a started write support
9fceb02d0ae598e95dc970b74767f19372d61af8 updated rakefile

git tag -a v1.2 9fceb02

共享标签
默认情况下，git push 命令并不会传送标签到远程仓库服务器上
在创建完标签后你必须显式地推送标签到共享服务器上。 这个过程就像共享远程分支一样 - 你可以运行 git push origin [tagname]。
git push origin v1.5
如果想要一次性推送很多标签，也可以使用带有 --tags
git push origin --tags

在 Git 中你并不能真的检出一个标签，因为它们并不能像分支一样来回移动。 如果你想要工作目录与仓库中特定的标签版本完全一样，可以使用 git checkout -b [branchname] [tagname] 在特定的标签上创建一个新分支：

Git 别名
当要输入 git commit 时，只需要输入 git ci。 随着你继续不断地使用 Git，可能也会经常使用其他命令，所以创建别名时不要犹豫。
git config --global alias.co checkout

分支创建
git branch testing

分支切换
git checkout testing

$ git checkout -b iss53
Switched to a new branch "iss53"
它是下面两条命令的简写：

$ git branch iss53
$ git checkout iss53

删除 hotfix 分支
git branch -d hotfix

合并 iss53 分支到 master 分支
$ git checkout master
Switched to branch 'master'
$ git merge iss53
Merge made by the 'recursive' strategy.
index.html |    1 +
1 file changed, 1 insertion(+)

遇到冲突时的分支合并
$ git merge iss53
Auto-merging index.html
CONFLICT (content): Merge conflict in index.html
Automatic merge failed; fix conflicts and then commit the result.

$ git status
On branch master
You have unmerged paths.
  (fix conflicts and run "git commit")

Unmerged paths:
  (use "git add <file>..." to mark resolution)

    both modified:      index.html

no changes added to commit (use "git add" and/or "git commit -a")

<<<<<<< HEAD:index.html
<div id="footer">contact : email.support@github.com</div>
=======
<div id="footer">
 please contact us at support@github.com
</div>
>>>>>>> iss53:index.html

<div id="footer">
please contact us at email.support@github.com
</div>

$ git status
On branch master
All conflicts fixed but you are still merging.
  (use "git commit" to conclude merge)

Changes to be committed:

    modified:   index.html

如果你对结果感到满意，并且确定之前有冲突的的文件都已经暂存了，这时你可以输入 git commit 来完成合并提交。

查看分支
git branch


Git log 查看日志（按q退出）
Git reset –hard <commit> 回到某个版本

Git reflog 会列出当前版本的之前的版本都是什么

忽略文件
一般我们总会有些文件无需纳入 Git 的管理，也不希望它们总出现在未跟踪文件列表。 通常都是些自动生成的文件，比如日志文件，或者编译过程中创建的临时文件等。 在这种情况下，我们可以创建一个名为 .gitignore 的文件，列出要忽略的文件模式。 来看一个实际的例子：

$ cat .gitignore
*.[oa]
*~
第一行告诉 Git 忽略所有以 .o 或 .a 结尾的文件。一般这类对象文件和存档文件都是编译过程中出现的。 第二行告诉 Git 忽略所有以波浪符（~）结尾的文件，许多文本编辑软件（比如 Emacs）都用这样的文件名保存副本。 此外，你可能还需要忽略 log，tmp 或者 pid 目录，以及自动生成的文档等等。 要养成一开始就设置好 .gitignore 文件的习惯，以免将来误提交这类无用的文件。

文件 .gitignore 的格式规范如下：

所有空行或者以 ＃ 开头的行都会被 Git 忽略。

可以使用标准的 glob 模式匹配。

匹配模式可以以（/）开头防止递归。

匹配模式可以以（/）结尾指定目录。

要忽略指定模式以外的文件或目录，可以在模式前加上惊叹号（!）取反。

所谓的 glob 模式是指 shell 所使用的简化了的正则表达式。 星号（*）匹配零个或多个任意字符；[abc] 匹配任何一个列在方括号中的字符（这个例子要么匹配一个 a，要么匹配一个 b，要么匹配一个 c）；问号（?）只匹配一个任意字符；如果在方括号中使用短划线分隔两个字符，表示所有在这两个字符范围内的都可以匹配（比如 [0-9] 表示匹配所有 0 到 9 的数字）。 使用两个星号（*) 表示匹配任意中间目录，比如`a/**/z` 可以匹配 a/z, a/b/z 或 `a/b/c/z`等。

我们再看一个 .gitignore 文件的例子：

# no .a files
*.a

# but do track lib.a, even though you're ignoring .a files above
!lib.a

# only ignore the TODO file in the current directory, not subdir/TODO
/TODO

# ignore all files in the build/ directory
build/

# ignore doc/notes.txt, but not doc/server/arch.txt
doc/*.txt

# ignore all .pdf files in the doc/ directory
doc/**/*.pdf
Tip
GitHub 有一个十分详细的针对数十种项目及语言的 .gitignore 文件列表，你可以在 https://github.com/github/gitignore 找到它.